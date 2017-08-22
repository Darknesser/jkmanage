<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Server;
use Illuminate\Http\Request;
use App\Http\Requests;

class ServiceController extends Controller
{
    //服务器列表
    public function serverList(Request $request) {
        $server = new Server();
        $servers = $server->selServer($request->all());
        return response()->json(['data' => $servers]);
    }

    //添加或编辑服务器
    public function updServer(Request $request) {
        $this->validate($request, [
            'owner' => 'required',
            'ip' => 'required',
            'server_account' => 'required',
            'server_pwd' => 'required',
        ], [
            'owner.required' => '持有者不为空',
            'ip.required' => 'IP不为空',
//            'ip.ip' => 'IP地址格式错误',
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
        $result = Server::findOrFail($request->get('id'));
        return response()->json(['data' => $result]);
    }

    //删除服务器
    public function delServer(Request $request) {
        $affectedRows = Server::where('id', $request->get('id'))->update(['is_del' => 0]);
        if($affectedRows) {
            return response()->json(['message' => '删除成功', 'code' => 1]);
        }
        return response()->json(['message' => '删除失败', 'code' => 0]);
    }

    //服务器持有者列表
    public function getOwnerList() {
        $result = Customer::where('source', '资管系统')->get(['name']);
        return response()->json(['data' => $result]);
    }
}
