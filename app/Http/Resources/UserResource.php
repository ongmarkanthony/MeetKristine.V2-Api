<?php

namespace App\Http\Resources;

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
            'id' => $this->id,
            'userRole' => $this->userRole,
            'employee_id' => $this->employee_id,
            'email' => $this->email,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'jobTitle' => $this->jobTitle,
            'department' => $this->department,
            'dateHired' => $this->dateHired,
            'dateOfBirth' => $this->dateOfBirth,
            'gender' => $this->gender,
            'address1' => $this->address1,
            'address2' => $this->address2,
            'city' => $this->city,
            'country' => $this->country,
            'postalCode' => $this->postalCode,
            'sssNumber' => $this->sssNumber,
            'philNumber' => $this->philNumber,
            'tinNumber' => $this->tinNumber,
            'hdmfNumber' => $this->hdmfNumber,
            'bankName' => $this->bankName,
            'bankAccount' => $this->bankAccount,
            'password' => $this->password,
            'remember_token' => $this->remember_token,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
