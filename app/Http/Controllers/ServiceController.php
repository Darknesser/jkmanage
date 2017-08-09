<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\Request;
use App\Http\Requests;

class ServiceController extends Controller
{
    //服务器列表
    public function serverList() {
        $server = new Server();
        $servers = $server->selServer();
        return response()->json(['data' => $servers]);
    }

    //添加、更新服务器
    public function updServer(Request $request) {
        $this->validate($request, [
            'owner' => 'required',
            'ip' => 'required|ip',
            'server_account' => 'required',
            'server_pwd' => 'required',
        ], [
            'owner.required' => '持有者不为空',
            'ip.required' => 'IP不为空',
            'ip.ip' => 'IP地址格式错误',
            'server_account.required' => '服务器账号不为空',
            'server_pwd.required' => '服务器密码不为空'
        ]);
        $server = new Server();
        $bool = $server->addServer($request->all());
        if($bool) {
            return response()->json(['message' => '保存成功', 'code' => 1]);
        }
        return response()->json(['message' => '保存失败', 'code' => 0]);
    }
}
