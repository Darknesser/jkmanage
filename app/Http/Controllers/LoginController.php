<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;

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
            Cookie::queue('pwd', Crypt::encrypt($password), 3600*24*30);
            return response()->json(['message' => '登录成功', 'code' => 1]);
        }
        return response()->json(['message' => '用户名或密码错误', 'code' => 0]);
    }

    //登录信息是否记住
    public function remember() {
        if(Auth::user()) {
            $user = Auth::user();
            if(Cookie::get('pwd')) {
                try {
                    $user->pwd = Crypt::decrypt(Cookie::get('pwd'));
                }catch (DecryptException $e) {
                    return response()->json(['message' => 'cookie解密失败', 'code' => 0]);
                }
            }
            return response()->json(['data' => $user, 'code' => 1]);
        }
    }

    //注销
    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}
