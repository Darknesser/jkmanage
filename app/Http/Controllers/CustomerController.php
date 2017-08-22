<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

use App\Http\Requests;

class CustomerController extends Controller
{
    //客户列表
    public function customerList(Request $request) {
        $customer = new Customer();
        $customers = $customer->selCustomer($request->all());
        return response()->json(['data' => $customers]);
    }

    //编辑时填充表单的数据
    public function oneCustomer(Request $request) {
        $result = Customer::findOrFail($request->get('id'));
        return response()->json(['data' => $result]);
    }

    //添加或编辑客户
    public function updCustomer(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'source' => 'required',
            'principal' => 'required'
        ], [
            'name.required' => '名称不为空',
            'source.required' => '来源不为空',
            'principal.required' => '负责人不为空'
        ]);
        $customer = new Customer();
        $bool = $customer->addCustomer($request->all());
        if($bool) {
            return response()->json(['message' => '保存成功', 'code' => 1]);
        }
        return response()->json(['message' => '尚未更改', 'code' => 0]);
    }

    //删除客户
    public function delCustomer(Request $request) {
        $affectedRows = Customer::where('id', $request->get('id'))->update(['is_del' => 0]);
        if($affectedRows) {
            return response()->json(['message' => '删除成功', 'code' => 1]);
        }
        return response()->json(['message' => '删除失败', 'code' => 0]);
    }
}
