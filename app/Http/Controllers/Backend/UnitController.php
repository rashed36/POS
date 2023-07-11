<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Unit;
use Auth;

class UnitController extends Controller
{
    public function view(){
        $allData = Unit::all();
        return view('backend.unit.view-unit',compact('allData'));
    }

    public function add(){
        return view('backend.unit.add-unit');
    }

    public function store(Request $request){
       
        $data = new Unit();
        $data->name = $request->name;
        $data->created_by = Auth::user()->id;
        $data->save();
        return redirect()->route('units.view')->with('success','Data Added Successfully');
    }

    public function edit($id){
        $editData = Unit::find($id);
        return view('backend.unit.edit-unit',compact('editData'));
    }

    public function update(Request $request,$id){
        $data = Unit::find($id);
        $data->name = $request->name;
        $data->updated_by = Auth::user()->id;
        $data->save();
        return redirect()->route('units.view')->with('success','Data Updated Successfully');  
    }

    public function delete($id){
        $unit = Unit::find($id);
        $unit -> delete();
        return redirect()->route('units.view')->with('success','Data Deleted Successfully');  
    }
}
