<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Route;

class DomainController extends Controller
{
    public function addDomain() {
        $cid = Route::input('cid');
        $id = Route::input('id');
        $pid = Route::input('pid');
//        $data = $pid ? Domain::findOrFail($pid) : '';
        return view('add-domain')->with(['cid' => $cid, 'id' => $id, 'pid' => $pid]);
    }

    //添加或编辑域名
    public function updDomain(Request $request) {
        $this->validate($request, [
            'name' => 'required'
        ], [
            'name.required' => '名称不为空'
        ]);
        $server = new Domain();
        $bool = $server->addDomain($request->all());
        if($bool) {
            return response()->json(['message' => '保存成功', 'code' => 1]);
        }
        return response()->json(['message' => '尚未更改', 'code' => 0]);
    }

    //域名列表
    public function domainList(Request $request) {
        $server = new Domain();
        $servers = $server->selDomain($request->all());
        return response()->json(['data' => $servers]);
    }

    //编辑时填充表单的数据
    public function oneDomain(Request $request) {
        $result = Domain::findOrFail($request->get('id'));
        return response()->json(['data' => $result]);
    }

    //删除域名
    public function delDomain(Request $request) {
        $affectedRows = Domain::where('id', $request->get('id'))->update(['is_del' => 0]);
        if($affectedRows) {
            return response()->json(['message' => '删除成功', 'code' => 1]);
        }
        return response()->json(['message' => '删除失败', 'code' => 0]);
    }
}
