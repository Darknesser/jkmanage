<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ServiceController extends Controller
{
    //资管系统服务器列表
    public function serverList() {
        return view('server-list');
    }
}
