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
            'username' => 'required|unique:users',
            'employee_num' => 'sometimes|required|unique:users' . $this->route('user'),
            'password' => 'sometimes|required|min:8',
            'email' => 'sometimes|required|unique:users' . $this->route('user'),
            'firstName' => 'sometimes|required',
            'lastName' => 'sometimes|required',
            'jobTitle' => 'sometimes|required',
            'department' => 'sometimes',
            'gender' => 'sometimes',
            'address1' => 'sometimes',
            'address2' => 'sometimes',
            'city' => 'sometimes',
            'country' => 'sometimes',
            'accrual' => 'sometimes',
            'sl_credits' => 'sometimes',
            'vl_credits' => 'sometimes',
            'el_credits' => 'sometimes',
            'salary_amount' => 'sometimes',
            'incentives' => 'sometimes',
            'pay_schedule' => 'sometimes',
            'thumbnail' => 'sometimes',
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
