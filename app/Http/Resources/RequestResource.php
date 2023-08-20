<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RequestResource extends JsonResource
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
            'leaveCreditId'=>$this->leave_credit_id,
            'requestedDate'=>$this->requested_date,
            'type'=>$this->type,
        ];
    }
}
