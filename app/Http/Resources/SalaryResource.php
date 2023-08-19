<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SalaryResource extends JsonResource
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
            'id'=>$this->id,
            'userId'=>$this->user_id,
            'paySchedule'=>$this->pay_schedule,
            'incentives'=>$this->incentives,
            'salaryAmount'=>$this->salary_amount,
        ];
    }
}
