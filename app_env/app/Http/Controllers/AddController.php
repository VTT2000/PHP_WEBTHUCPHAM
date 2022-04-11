<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddController extends Controller {

    public function create(Request $request, $modelName) {
        
        $model = '\App\Models\\' . ucfirst($modelName);
        $model = new $model;
        $configs = $model->addConfigs();
        return view('admin.add', [
            'modelName' => $modelName,
            'configs' => $configs
        ]);
    }
    
    function store(Request $request, $modelName) {

        $model = '\App\Models\\' . ucfirst($modelName);
        $model = new $model;
        $configs = $model->addConfigs();
        $arrayValidateFields = [];
        foreach ($configs as $config) {
            if (!empty($config['validate'])) {
                $arrayValidateFields[$config['field']] = $config['validate'];
            }
        }
        $validated = $request->validate($arrayValidateFields);
        foreach ($configs as $config) {
            if (!empty($config['add']) && $config['add'] == true) {
                $model->{$config['field']} = $request->input($config['field']);
            }
        }
        return view('admin.add', [
            'success' => $model->save(),
            'modelName' => $modelName,
            'configs' => $configs
        ]);
    }
}
