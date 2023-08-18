<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LeaveRequestUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'user_id'=>'sometimes|required|exists:users,id',
            'leave_types_id'=>'sometimes|required|exists:leave_types,id',
            'status'=>'sometimes|required',
            'request_date'=>'sometimes|required|date_format:m/d/Y',
            'start_date'=>'sometimes|required|date_format:m/d/Y',
            'end_date'=>'sometimes|required\date_format:m/d/Y',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'=>false,
            'message'=>"Validation errors",
            'data'=>$validator->errors()
        ]));
    }
}
