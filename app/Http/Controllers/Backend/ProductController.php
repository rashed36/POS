<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Product;
use App\Model\Supplier;
use App\Model\Unit;
use Auth;

class ProductController extends Controller
{
    public function view(){
        $allData = Product::all();
        return view('backend.product.view-product',compact('allData'));
    }

    public function add(){
        $data['supplier'] = Supplier::all();
        $data['category'] = Category::all();
        $data['unit'] = Unit::all();
        return view('backend.product.add-product',$data);
    }

    public function store(Request $request){
       
        $data = new Product();
        $data->supplier_id = $request->supplier_id;
        $data->category_id = $request->category_id;
        $data->unit_id = $request->unit_id;
        $data->name = $request->name;
        $data->quantity = '0';
        $data->created_by = Auth::user()->id;
        $data->save();
        return redirect()->route('products.view')->with('success','Data Added Successfully');
    }

    public function edit($id){
        $data['editData'] = Product::find($id);
        $data['supplier'] = Supplier::all();
        $data['category'] = Category::all();
        $data['unit'] = Unit::all();
        return view('backend.product.edit-product',$data);
    }

    public function update(Request $request,$id){
        $data = Product::find($id);
        $data->supplier_id = $request->supplier_id;
        $data->category_id = $request->category_id;
        $data->unit_id = $request->unit_id;
        $data->name = $request->name;
        $data->save();
        return redirect()->route('products.view')->with('success','Data Updated Successfully');  
    }

    public function delete($id){
        $data = Product::find($id);
        $data -> delete();
        return redirect()->route('products.view')->with('success','Data Deleted Successfully');  
    }
}
