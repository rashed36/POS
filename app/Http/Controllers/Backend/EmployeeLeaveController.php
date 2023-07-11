<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Employee;
use App\Model\EmployeeLeave;
use App\Model\LeavePurpose;
use App\Model\EmployeeSalaryLog;
Use Auth;
use DB;

class EmployeeLeaveController extends Controller
{
    public function view(){
        $data['allData'] = EmployeeLeave::orderBy('id','desc')->get();
        return view('backend.employee.employee-leave-view',$data);
    }

    public function add(){
        $data['employees'] = Employee::all();
        $data['leave_purpose'] = LeavePurpose::all();
        return view('backend.employee.employee-leave-add', $data);
    }

    public function store(Request $request){
        if($request->leave_purpose_id == "0"){
            $leavepurpose =new LeavePurpose();
            $leavepurpose->name = $request->name;
            $leavepurpose->save();
            $leave_purpose_id = $leavepurpose->id;
        }else{
            $leave_purpose_id = $request->leave_purpose_id;
        }
            $data = new EmployeeLeave();
            $data->employee_id = $request->employee_id;
            $data->start_date = date('Y-m-d',strtotime($request->start_date));
            $data->end_date = date('Y-m-d',strtotime($request->end_date));
            $data->leave_purpose_id = $leave_purpose_id;
            $data->save();
        
        return redirect()->route('employee.leave.view')->with('success','Data Saved Successfully!');  
    }

    public function edit($id){
        $data['editData'] = EmployeeLeave::find($id);
        $data['employees'] = Employee::all();
        $data['leave_purpose'] = LeavePurpose::all();
        return view('backend.employee.employee-leave-add', $data);
    }

    public function update(Request $request, $id){
        if($request->leave_purpose_id == "0"){
            $leavepurpose =new LeavePurpose();
            $leavepurpose->name = $request->name;
            $leavepurpose->save();
            $leave_purpose_id = $leavepurpose->id;
        }else{
            $leave_purpose_id = $request->leave_purpose_id;
        }
            $data = EmployeeLeave::find($id);
            $data->employee_id = $request->employee_id;
            $data->start_date = date('Y-m-d',strtotime($request->start_date));
            $data->end_date = date('Y-m-d',strtotime($request->end_date));
            $data->leave_purpose_id = $leave_purpose_id;
            $data->save();
        
        return redirect()->route('employee.leave.view')->with('success','Data Updated Successfully!');  
    }
}
