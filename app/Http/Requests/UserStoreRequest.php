<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserStoreRequest extends FormRequest
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
            'employee_num'=>'required|unique:users',
            'password'=>'required|min:8',
            'email'=>'required|unique:users',
            'firstName'=>'required',
            'lastName'=>'required',
            'jobTitle'=>'required',
            'department'=>'required',
            'dateHired'=>'required',
            'dateOfBirth'=>'required',
            'gender'=>'required',
            'address1'=>'required',
            'address2'=>'required',
            'city'=>'required',
            'country'=>'required',
            'postalCode'=>'required',
            'sssNumber'=>'required',
            'philNumber'=>'required',
            'tinNumber'=>'required',
            'hdmfNumber'=>'required',
            'bankName'=>'required',
            'bankAccount'=>'required',
            'accrual'=>'required',
            'sl_credits'=>'required',
            'vl_credits'=>'required',
            'el_credits'=>'required',
            'salary_amount'=>'required',
            'incentives'=>'required',
            'pay_schedule'=>'required',
            'thumbnail'=>'required',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'=> false,
            'message'=>'Validation errors',
            'data'=>$validator->errors()
        ]));
    }
}
