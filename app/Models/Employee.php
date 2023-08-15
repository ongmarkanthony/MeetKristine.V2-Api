<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function employee_salary() {
        return $this->belongsTo(EmployeeSalary::class);
    }


    public function leave_types(){
        return $this->hasMany(LeaveType::class);
    }

    public function leave_requests() {
        return $this->hasMany(LeaveRequest::class);
    }

    
}
