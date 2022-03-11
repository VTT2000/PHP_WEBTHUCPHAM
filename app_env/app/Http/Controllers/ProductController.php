<?php

namespace App\Http\Controllers;

use App\Models;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function index(){

        $DB = new DB();
        $nhaSanXuats = $DB::table('nhasanxuat')->get();

        return view('welcome', ['nhaSanXuats' => $nhaSanXuats]);
    }
}
