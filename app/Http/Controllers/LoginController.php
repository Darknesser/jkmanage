<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //登录验证
    public function login(Request $request) {
        if (Auth::check()) {
            response()->json(['message' => '已经登录了', 'code' => 0]);
        }

        $name = $request->get('name');
        $password = $request->get('password');
        $remember = $request->get('remember');

        $this->validate($request, [
            'name' => 'required',
            'password' => 'required|min:5'
        ], [
            'name.required' => '用户名不为空',
            'password.required' => '密码不为空',
            'password.min' => '密码不小于5位'
        ]);
        if(Auth::attempt(['name' => $name, 'password' => $password], $remember)) {
            return response()->json(['message' => '登录成功', 'code' => 1]);
        }
        return response()->json(['message' => '用户名或密码错误', 'code' => 0]);
    }

    //登录信息是否记住
    public function remember() {
        dd(Auth::viaRemember());
        if(Auth::user()) {
            dd(Auth::user());
            $user = Auth::user();
            return response()->json(['name' => $user->name, 'password' => $user->password, 'remember' => 1]);
        }
    }
}
