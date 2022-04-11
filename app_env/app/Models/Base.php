<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;

class Base extends Model {
    
    public function listingConfigs(){
        return $this->getConfigs('listing');
    }
    
    public function addConfigs(){
        return $this->getConfigs('add');
    }

    public function updateConfigs(){
        return $this->getConfigs('update');
    }

    public function deleteConfigs(){
        return $this->getConfigs('delete');
    }
    
    public function getConfigs($interface){
        $configs = $this->configs();
        $result = [];
        foreach($configs as $config){
            if(!empty($config[$interface]) && $config[$interface] == true){
                $result[] = $config;
            }
        }
        return $result;
    }

    public function getFilter($request, $configs, $modelName) {
        $conditions = [];
        if ($request->method() == "POST") {
            foreach ($configs as &$config) {
                if (!empty($config['filter'])) {
                    $value = $request->input($config['field']);
                    switch ($config['filter']) {
                        case "equal":
                            if (!empty($value)) {
                                $conditions[] = [
                                    'field' => $config['field'],
                                    'condition' => '=',
                                    'value' => $value
                                ];
                                $config['filter_value'] = $value;
                            }
                            break;
                        case "like":
                            if (!empty($value)) {
                                $conditions[] = [
                                    'field' => $config['field'],
                                    'condition' => 'like',
                                    'value' => '%' . $value . '%'
                                ];
                                $config['filter_value'] = $value;
                            }
                            break;
                        case "between":
                            if (!empty($value['from'])) {
                                $conditions[] = [
                                    'field' => 'price',
                                    'condition' => '>=',
                                    'value' => $value['from']
                                ];
                                $config['filter_from_value'] = $value['from'];
                            }
                            if (!empty($value['to'])) {
                                $conditions[] = [
                                    'field' => 'price',
                                    'condition' => '<=',
                                    'value' => $value['to']
                                ];
                                $config['filter_to_value'] = $value['to'];
                            }
                            break;
                    }
                }
            }
            Cookie::queue(strtolower($modelName) . '_filter', json_encode($conditions), 24 * 60); //Cookie: 24 hours
        } else { //Method: GET
            $conditions = json_decode(Cookie::get(strtolower($modelName) . '_filter'));
            if (!empty($conditions)) {
                foreach ($conditions as &$condtion) {
                    $condtion = (array) $condtion;
                    foreach ($configs as &$config) {
                        if ($config['field'] == $condtion['field']) {
                            switch ($config['filter']) {
                                case "equal":
                                    $config['filter_value'] = $condtion['value'];
                                    break;
                                case "like":
                                    $config['filter_value'] = str_replace("%", "", $condtion['value']);
                                    break;
                                case "between":
                                    if ($condtion['condition'] == ">=") {
                                        $config['filter_from_value'] = str_replace("%", "", $condtion['value']);
                                    } else {
                                        $config['filter_to_value'] = str_replace("%", "", $condtion['value']);
                                    }
                                    break;
                            }
                        }
                    }
                }
            }
        }
        return array(
            'conditions' => $conditions,
            'configs' => $configs,
        );
    }

    public function defaultListingConfigs() {
        return array(
            array(
                'field' => 'edit',
                'name' => 'Sửa',
                'type' => 'edit',
                'listing' => true,
                'add' => false
            ),
            array(
                'field' => 'delete',
                'name' => 'Xóa',
                'type' => 'delete',
                'listing' => true,
                'add' => false
            )
        );
    }

}
