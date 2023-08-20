<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveCredit extends Model
{
    use HasFactory;
    
    protected $fillable =[
        'user_id',
        'name',
        'credit_needed',
    ];

    // protected $table = 'leaveCredits';
    // protected $primaryKey = 'id';

    // public function getRouteKeyName()
    // {
    //     return 'id';
    // }

    public function user() {
        return $this->belongsTo(User::class);
    }

}
