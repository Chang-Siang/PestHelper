<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class catalogController extends Controller
{

    public function pestDataList()
    {
        //抓資料
        $datas = DB::table('pestdata')->get();
        $sort = DB::table('pestorder')->orderBy('count','desc')->get();
        return view('pestcatalog',compact('datas','sort'));
    }

    public function plantDataList()
    {
        
        $datas = DB::table('plantdata')->get();
        $sort = DB::table('plantfamily')->orderBy('count','desc')->get();
        return view('plantcatalog',compact('datas','sort'));

    }
}