<?php

namespace App\Http\Controllers;

use App\Models\NhaCungCap;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Str;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers=NhaCungCap::where('status','1')->orderBy('id','DESC')->paginate(5);
        return view('backend.supplier.index')->with('suppliers',$suppliers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'tenncc'=>'string',
            'diachi'=>'string',
            'phone'=>'string',
            'email'=>'string',
            'status'=>'required',
        ]);
        $data=$request->all();
        $status=NhaCungCap::create($data);
        if($status){
            request()->session()->flash('success','Lưu dữ liệu thành công');
        }else{
            request()->session()->flash('error','Đã xảy ra lỗi khi lưu dữ liệu');
        }
        return redirect()->route('supplier.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier=NhaCungCap::findOrFail($id);
        return view('backend.supplier.edit')->with('supplier',$supplier);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $supplier=NhaCungCap::findorFail($id);
        $this->validate($request,[
            'tenncc'=>'string',
            'diachi'=>'string',
            'phone'=>'string',
            'email'=>'string',
            'status'=>'required',
        ]);
        $data=$request->all();
        $status=$supplier->fill($data)->save();
        if($status){
            request()->session()->flash('success','Lưu dữ liệu thành công');
        }else{
            request()->session()->flash('error','Đã xảy ra lỗi khi lưu dữ liệu!');
        }
        return redirect()->route('supplier.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier=NhaCungCap::findOrFail($id);
        $status=$supplier->delete();
        if($status){
            request()->session()->flash('success','Xóa thành công!');
        }else{
            request()->session()->flash('error','Đã xảy ra lỗi không thể xóa dữ liệu!');
        }
        return redirect()->route('supplier.index');  
    }
}
