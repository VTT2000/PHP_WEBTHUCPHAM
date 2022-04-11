<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller {

    public function loginPost(Request $request) {
        
        $DB = new DB();
        if($nv = $DB::table('nhanvien')->where('Username', $request->get('Username'))->first()){
            if (strcmp($nv->Password, $request->get('Password')) == 0)
            {
                $request->session()->put('TenNV', $nv->Ten);
                $request->session()->put('nv1', $nv->IdNV);
                return Redirect::to('admin/admin');
            }
            else
            {
                return Redirect::to('admin/login');
            }
        }
        else{
            return Redirect::to('admin/login');
        }
    }

    public function logout(){
        return redirect('admin/login');
    }
}
