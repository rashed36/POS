<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EmployeeAttendance extends Model
{
    public function employee(){
        return $this->belongsTo(Employee::class, 'employee_id','id');
    }

}
