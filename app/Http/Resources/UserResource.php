<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
<<<<<<< HEAD
            'id' => $this->id,
            'username' => $this->username,
            'employee_num' => $this->employee_num,
            'role' => $this->role,
            'email' => $this->email,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'jobTitle' => $this->jobTitle,
            'department' => $this->department,
            'dateOfBirth' => Carbon::parse($this->dateOfBirth)->format('Y-m-d'),
            'dateHired' => Carbon::parse($this->dateHired)->format('Y-m-d'),
            'gender' => $this->gender,
            'address1' => $this->address1,
            'address2' => $this->address2,
            'city' => $this->city,
            'country' => $this->country,
            'accrual' => $this->accrual,
            'sl_credits' => $this->sl_credits,
            'vl_credits' => $this->vl_credits,
            'el_credits' => $this->el_credits,
            'salary_amount' => $this->salary_amount,
            'pay_schedule' => $this->pay_schedule,
            'incentives' => $this->incentives,
            'thumbnail' => $this->thumbnail,
=======
            'id'=>$this->id,
            'username'=>$this->username,
            'employee_num'=>$this->employee_num,
            'role'=>$this->role,
            'email'=>$this->email,
            'firstName'=>$this->firstName,
            'lastName'=>$this->lastName,
            'jobTitle'=>$this->jobTitle,
            'department'=>$this->department,
            'dateOfBirth'=>$this->dateOfBirth,
            'gender'=>$this->gender,
            'address1'=>$this->address1,
            'address2'=>$this->address2,
            'city'=>$this->city,
            'country'=>$this->country,
            'accrual'=>$this->accrual,
            'sl_credits'=>$this->sl_credits,
            'vl_credits'=>$this->vl_credits,
            'el_credits'=>$this->el_credits,
            'salary_amount'=>$this->salary_amount,
            'pay_schedule'=>$this->pay_schedule,
            'incentives'=>$this->incentives,
>>>>>>> e6c2aa0b25001b1586f44b8e0d23ca80bf25c47a

        ];
    }
}
