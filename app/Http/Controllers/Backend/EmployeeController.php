<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Employee;
use App\Model\EmployeeSalaryLog;
Use Auth;
use DB;
class EmployeeController extends Controller
{
    public function view(){
        $data['allData'] = Employee::orderBy('id','desc')->get();
        return view('backend.employee.other-employee-view',$data);
    }

    public function add(){
        return view('backend.employee.employee-add');
    }

    public function store(Request $request){
        DB::transaction(function() use($request) {
            $employee = new Employee();
            $employee->employ_name = $request->employ_name;
            $employee->fathers_name = $request->fathers_name;
            $employee->mothers_name = $request->mothers_name;
            $employee->mobile_no = $request->mobile_no;
            $employee->address = $request->address;
            $employee->dob = date('Y-m-d',strtotime($request->dob));
            $employee->gender = $request->gender;
            $employee->religion = $request->religion;
            $employee->designation = $request->designation;
            $employee->salary = $request->salary;
            $employee->join_date = date('Y-m-d',strtotime($request->join_date));
            $employee->created_by = Auth::user()->id;
            if($request->file('image')){
                $file = $request->file('image');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/employee_image'), $filename);
                $employee['image'] = $filename;
            }
            $employee->save();
            $employee_salary = new EmployeeSalaryLog();
            $employee_salary->employee_id = $request->employee_id = $employee->id;
            $employee_salary->effected_date = $request->effected_date = date('Y-m-d',strtotime($request->join_date));
            $employee_salary->previous_salary = $request->previous_salary = $request->salary;
            $employee_salary->present_salary = $request->present_salary = $request->salary;
            $employee_salary->increment_salary = $request->increment_salary = '0';
            $employee_salary->save();
        });
        return redirect()->route('employee.reg.view')->with('success','Data Saved Successfully!');  
    }

    public function edit($id){
        $data['editData'] = Employee::find($id);
       
        return view('backend.employee.employee-add',$data);
    }

    public function update(Request $request, $id){
            $employee = Employee::find($id);
            $employee->employ_name = $request->employ_name;
            $employee->fathers_name = $request->fathers_name;
            $employee->mothers_name = $request->mothers_name;
            $employee->mobile_no = $request->mobile_no;
            $employee->address = $request->address;
            $employee->dob = date('Y-m-d',strtotime($request->dob));
            $employee->gender = $request->gender;
            $employee->religion = $request->religion;
            $employee->designation = $request->designation;
            $employee->updated_by = Auth::user()->id;
            if($request->file('image')){
                $file = $request->file('image');
                @unlink(public_path('upload/employee_image',$data->image));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/employee_image'), $filename);
                $employee['image'] = $filename;
            }
            $employee->save();

        return redirect()->route('employee.reg.view')->with('success','Data Updated Successfully!');  
    }

    public function single_view($id){
        $data['editData'] = Employee::find($id);
        return view('backend.employee.employee-single-view',$data);
    }
}
