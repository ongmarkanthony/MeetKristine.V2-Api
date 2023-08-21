<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveProposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'requested_date',
        'type',
        'leave_type'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

   

    
}
