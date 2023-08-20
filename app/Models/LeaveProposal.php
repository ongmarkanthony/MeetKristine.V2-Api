<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveProposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'leave_credit_id',
        'requested_date',
        'type',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function leaveCredit() {
        return $this->belongsTo(LeaveCredit::class);
    }

    
}
