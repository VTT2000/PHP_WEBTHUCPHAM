<?php

namespace App\Http\Controllers;

use App\Models\Loaithucpham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateController extends Controller {
    public function up(Request $request, $modelName) {
        $model = '\App\Models\\' . ucfirst($modelName);
        $model = new $model;
        $configs = $model->updateConfigs();
        $records = $model;
        return $records[0]->get(0);
        /*
        return view('admin.update', [
            'records' => $records,
            'modelName' => $modelName,
            'configs' => $configs
        ]);
        */
    }
    /*
    public function updateitem(Request $request, $modelName){
        
        $model = '\App\Models\\' . ucfirst($modelName);
        $model = new $model;
        $configs = $model->updateConfigs();
        $arrayValidateFields = [];
        foreach ($configs as $config) {
            if (!empty($config['validate'])) {
                $arrayValidateFields[$config['field']] = $config['validate'];
            }
        }
        $validated = $request->validate($arrayValidateFields);
        foreach ($configs as $config) {
            if (!empty($config['update']) && $config['update'] == true) {
                $model->{$config['field']} = $request->input($config['field']);
            }
        }
        $model->exists = true;
        return view('admin.update', [
            'success' => $model->save(),
            'modelName' => $modelName,
            'configs' => $configs
        ]);
    }
    */
}
