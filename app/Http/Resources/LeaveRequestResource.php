<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LeaveRequestResource extends JsonResource
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
            'user_id'=>$this->user_id,
            'leave_types_id'=>$this->leave_types_id,
            'status'=>$this->status,
            'request_date'=>$this->request_date,
            'start_date'=>$this->start_date,
            'end_date'=>$this->end_date,
        ];
    }
}
