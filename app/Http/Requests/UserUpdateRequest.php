<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserUpdateRequest extends FormRequest
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
            'username'=>'required|unique:users',
            'employee_num'=>'sometimes|required|unique:users',
            'password'=>'sometimes|required|min:8',
            'email'=>'sometimes|required|unique:users',
            'firstName'=>'sometimes|required',
            'lastName'=>'sometimes|required',
            'jobTitle'=>'sometimes|required',
            'department'=>'sometimes|required',
            'gender'=>'sometimes|required',
            'address1'=>'sometimes|required',
            'address2'=>'sometimes|required',
            'city'=>'sometimes|required',
            'country'=>'sometimes|required',
            'accrual'=>'sometimes|required',            
            'sl_credits'=>'sometimes|required',
            'vl_credits'=>'sometimes|required',
            'el_credits'=>'sometimes|required',
            'salary_amount'=>'sometimes|required',
            'incentives'=>'sometimes|required',
            'pay_schedule'=>'sometimes|required',
            'thumbnail'=>'sometimes|required',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'=>false,
            'message'=>'Validation errors',
            'data'=>$validator->errors()
        ]));
    }
}
