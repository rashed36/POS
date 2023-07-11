<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Supplier;
use Auth;

class SuppliersController extends Controller
{
    public function view(){
        $allData = Supplier::all();
        return view('backend.supplier.view-supplier',compact('allData'));
    }

    public function add(){
        return view('backend.supplier.add-supplier');
    }

    public function store(Request $request){
       
        $data = new Supplier();
        $data->name = $request->name;
        $data->mobile_no = $request->mobile_no;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->created_by = Auth::user()->id;
        $data->save();
        return redirect()->route('suppliers.view')->with('success','Data Added Successfully');
    }

    public function edit($id){
        $editData = Supplier::find($id);
        return view('backend.supplier.edit-supplier',compact('editData'));
    }

    public function update(Request $request,$id){
        $data = Supplier::find($id);
        $data->name = $request->name;
        $data->mobile_no = $request->mobile_no;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->updated_by = Auth::user()->id;
        $data->save();
        return redirect()->route('suppliers.view')->with('success','Data Updated Successfully');  
    }

    public function delete($id){
        $supplier = Supplier::find($id);
        $supplier -> delete();
        return redirect()->route('suppliers.view')->with('success','Data Deleted Successfully');  
    }

}
