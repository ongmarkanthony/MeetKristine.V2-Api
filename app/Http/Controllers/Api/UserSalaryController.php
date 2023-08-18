<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserSalaryStoreRequest;
use App\Http\Requests\UserSalaryUpdateRequest;
use App\Http\Resources\UserSalaryResource;
use App\Models\UserSalary;
use Illuminate\Http\Request;

class UserSalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return UserSalaryResource::collection(UserSalary::paginate(10));
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
    public function store(UserSalaryStoreRequest $request)
    {
        //
        return UserSalaryResource::make(
            UserSalary::create([
                'salary_amount'=>$request->salary_amount,
                'pay_schedule'=>$request->pay_schedule,
                'user_id'=>$request->user_id
            ])
            );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(UserSalary $userSalary)
    {
        //
        return UserSalaryResource::make($userSalary);
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
    public function update(UserSalaryUpdateRequest $request, UserSalary $userSalary)
    {
        //
        if (isset($request->salary_amount)) {
            $userSalary->salary_amount = $request->salary_amount;
        }
        if (isset($request->pay_schedule)) {
            $userSalary->pay_schedule = $request->pay_schedule;
        }
        if (isset($request->user_id)) {
            $userSalary->user_id = $request->user_id;
        }

        $userSalary->save();

        return UserSalaryResource::make($userSalary);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserSalary $userSalary)
    {
        //
        $userSalary->delete();
        return response()->json([
            'success'=>true,
            'message'=>'Successfully deleted'
        ]);
    }
}
