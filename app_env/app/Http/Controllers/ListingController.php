<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ListingController extends Controller {

    public function index(Request $request, $modelName) {

        $model = '\App\Models\\' . ucfirst($modelName);
        $model = new $model;
        $configs = $model->listingConfigs();
        $records = $model::paginate(5);
        return view('admin.listing', [
            'records' => $records,
            'configs' => $configs,
            'modelName' => $modelName,
            'title' => $model->title,
        ]);
    }

}
