<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeleteController extends Controller {

    public function del(Request $request, $modelName) {
        
        $model = '\App\Models\\' . ucfirst($modelName);
        return view('admin.delete');
    }
    
}
