<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $query = User::query();

        if (isset($request->jobTitle)) {
            $query->where('jobTitle', $request->jobTitle);
        }
        if (isset($request->department)) {
            $query->where('department', $request->department);
        }
        if (isset($request->gender)) {
            $query->where('gender', $request->gender);
        }


        return UserResource::collection($query->paginate(15));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $validation = $request->validated();
        //
        $user = User::create([
            'username' => $request->username,
            'employee_num' => $request->employee_num,
            'password' => $request->password,
            'email' => $request->email,
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'jobTitle' => $request->jobTitle,
            'department' => $request->department,
            'dateHired' => $request->dateHired,
            'dateOfBirth' => $request->dateOfBirth,
            'gender' => $request->gender,
            

        ]);


        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');

            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->storePubliclyAs('public/users', $fileName);

            $user->thumbnail = 'storage/users/ ' . $fileName;
            $user->save();
        }
        return UserResource::make($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::find($id);

        return UserResource::make($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = User::find($id);

        if (isset($request->username)) {
            $user->username = $request->username;
        }
        if (isset($request->employee_num)) {
            $user->employee_num = $request->employee_num;
        }
        if (isset($request->password)) {
            $user->password = $request->password;
        }
        if (isset($request->email)) {
            $user->email = $request->email;
        }
        if (isset($request->firstName)) {
            $user->firstName = $request->firstName;
        }
        if (isset($request->lastName)) {
            $user->lastName = $request->lastName;
        }
        if (isset($request->jobTitle)) {
            $user->jobTitle = $request->jobTitle;
        }
        if (isset($request->department)) {
            $user->department = $request->department;
        }
        if (isset($request->gender)) {
            $user->gender = $request->gender;
        }
        if (isset($request->dateOfBirth)) {
            $user->dateOfBirth = $request->dateOfBirth;
        }
        if (isset($request->address1)) {
            $user->address1 = $request->address1;
        }
        if (isset($request->address2)) {
            $user->address2 = $request->address2;
        }
        if (isset($request->city)) {
            $user->city = $request->city;
        }
        if (isset($request->country)) {
            $user->country = $request->country;
        }
        if (isset($request->accrual)) {
            $user->accrual = $request->accrual;
        }
        if (isset($request->sl_credits)) {
            $user->sl_credits = $request->sl_credits;
        }
        if (isset($request->vl_credits)) {
            $user->vl_credits = $request->vl_credits;
        }
        if (isset($request->el_credits)) {
            $user->el_credits = $request->el_credits;
        }
        if (isset($request->salary_amount)) {
            $user->salary_amount = $request->salary_amount;
        }
        if (isset($request->incentives)) {
            $user->incentives = $request->incentives;
        }
        if (isset($request->pay_schedule)) {
            $user->pay_schedule = $request->pay_schedule;
        }

        $user->save();

        return UserResource::make($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'Successfully deleted',
        ]);
    }
}
