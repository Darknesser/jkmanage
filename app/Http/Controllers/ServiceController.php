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

    //添加、编辑服务器
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
        return response()->json(['message' => '尚未更改', 'code' => 0]);
    }

    //编辑时填充表单的数据
    public function oneServer(Request $request) {
        $server = new Server();
        $result = $server->findOrFail($request->get('id'));
        return response()->json(['data' => $result]);
    }

    //删除服务器
    public function delServer(Request $request) {
        $server = new Server();
        $affectedRows = $server->where('id', $request->get('id'))->update(['is_del' => 0]);
        if($affectedRows) {
            return response()->json(['message' => '删除成功', 'code' => 1]);
        }
        return response()->json(['message' => '删除失败', 'code' => 0]);
    }
}
