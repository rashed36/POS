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

class MonthlySalaryController extends Controller
{
    public function view(){
        return view('backend.employee.employee-monthly-salary-view');
    }

    public function getSalary(Request $request){
        return view('backend.employee.employee-monthly');
    }
}
