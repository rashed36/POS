<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Employee;
use App\Model\EmployeeSalaryLog;
Use Auth;
use DB;
class EmployeeSalaryController extends Controller
{
    public function view(){
        $data['allData'] = Employee::orderBy('id','desc')->get();
        return view('backend.employee.employee-salary-view',$data);
    }

    public function increment($id){
        $data['editData'] = Employee::find($id);
        return view('backend.employee.increment-employee-salary',$data);
    }

    public function store(Request $request, $id){
            $employee_salary = Employee::find($id);
            $previous_salary = $employee_salary->salary;
            $present_salary = (float)$previous_salary+(float)$request->increment_salary;
            $employee_salary->salary = $present_salary;
            $employee_salary->save();

            $salaryData = new EmployeeSalaryLog();
            $salaryData->employee_id = $request->employee_id = $id;
            $salaryData->previous_salary = $previous_salary;
            $salaryData->increment_salary = $request->increment_salary;
            $salaryData->present_salary = $present_salary;
            $salaryData->effected_date = $request->effected_date = date('Y-m-d',strtotime($request->effected_date));
            $salaryData->save();

        return redirect()->route('employee.salary.view')->with('success','Salary Increment Successfully!');  
     }

     public function detils($id){
        $data['detils'] = Employee::find($id);
        $data['salary_log'] = EmployeeSalaryLog::where('employee_id',$data['detils']->id)->get();
        return view('backend.employee.employee-salary-detils',$data);
    }
}
