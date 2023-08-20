<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'employee_num',
        'password',
        'email',
        'firstName',
        'lastName',
        'jobTitle',
        'department',
        'dateHired',
        'dateOfBirth',
        'gender',
        'address1',
        'address2',
        'city',
        'country',
        'postalCode',
        'sssNumber',
        'philNumber',
        'tinNumber',
        'hdmfNumber',
        'bankName',
        'bankAccount',
        'accrual',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function leaveCredits() {
        return $this->hasMany(LeaveCredit::class);
    }

    public function requests() {
        return $this->hasMany(Request::class);
    }

    public function salaries() {
        return $this->hasMany(Salary::class);
    }

}
