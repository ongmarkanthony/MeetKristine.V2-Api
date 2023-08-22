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
            'username' => 'required|unique:users',
            'employee_num' => 'required|unique:users',
            'password' => 'required|min:8',
            'email' => 'required|unique:users',
            'firstName' => 'required',
            'lastName' => 'required',
            'jobTitle' => 'required',
            'department' => 'required',
            'dateHired' => 'required|date_format:Y-m-d',
            'dateOfBirth' => 'required|date_format:Y-m-d',
            'address1' => 'nullable',
            'address2' => 'nullable',
            'city' => 'nullable',
            'country' => 'nullable',
            'postalCode' => 'nullable',
            'sssNumber' => 'nullable',
            'philNumber' => 'nullable',
            'tinNumber' => 'nullable',
            'hdmfNumber' => 'nullable',
            'bankName' => 'nullable',
            'bankAccount' => 'nullable',
            'accrual' => 'nullable',
            'sl_credits' => 'nullable',
            'vl_credits' => 'nullable',
            'el_credits' => 'nullable',
            'salary_amount' => 'nullable',
            'incentives' => 'nullable',
            'pay_schedule' => 'nullable',
            'thumbnail' => 'nullable',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'data' => $validator->errors()
        ]));
    }
}
