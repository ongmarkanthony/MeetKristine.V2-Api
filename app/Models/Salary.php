<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pay_schedule',
        'incentives',
        'salary_amount'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    } 
}
