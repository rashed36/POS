<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Employee;
use App\Model\EmployeeLeave;
use App\Model\LeavePurpose;
use App\Model\EmployeeSalaryLog;
use App\Model\EmployeeAttendance;
Use Auth;
use DB;

class EmployeeAttendController extends Controller
{
    public function view(){
        $data['allData'] = EmployeeAttendance::select('date')->groupBy('date')->orderBy('id','desc')->get();
        return view('backend.employee.employee-attendance-view',$data);
    }

    public function add(){
        $data['employees'] = Employee::all();
        return view('backend.employee.employee-attendance-add', $data);
    }

    public function store(Request $request){
        EmployeeAttendance::where('date',date('Y-m-d',strtotime($request->date)))->delete();
       $countemployee = count($request->employee_id);
       for ($i=0; $i<$countemployee; $i++) {
           $attend_status = 'attend_status'.$i;
           $attend = new EmployeeAttendance();
           $attend->date = date('Y-m-d',strtotime($request->date));
           $attend->employee_id = $request->employee_id[$i];
           $attend->attend_status = $request->$attend_status;
           $attend->save();
       }
        
        return redirect()->route('employee.attend.view')->with('success','Data Saved Successfully!');  
    }

    public function edit($date){
        $data['editData'] = EmployeeAttendance::where('date',$date)->get();
        $data['employees'] = Employee::all();
        return view('backend.employee.employee-attendance-add',$data);
    }

    public function detils($date){
        $data['detils'] = EmployeeAttendance::where('date',$date)->get();
        return view('backend.employee.employee-attendance-detils',$data);
    }



}
