<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SalaryStoreRequest;
use App\Http\Requests\SalaryUpdateRequest;
use App\Http\Resources\SalaryResource;
use App\Models\Salary;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return SalaryResource::collection(Salary::paginate(10));
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
    public function store(SalaryStoreRequest $request)
    {
        //
        return Salary::create([
            'user_id'=>$request->user_id,
            'pay_schedule'=>$request->pay_schedule,
            'incentives'=>$request->incentives,
            'salary_amount'=>$request->salary_amount,
        ]) ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Salary $salary)
    {
        //
        return SalaryResource::make($salary);
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
    public function update(SalaryUpdateRequest $request, Salary $salary)
    {
        //
        if (isset($request->user_id)) {
            $salary->user_id = $request->user_id;
        }
        if (isset($request->pay_schedule)) {
            $salary->pay_schedule = $request->pay_schedule;
        }
        if (isset($request->incentives)) {
            $salary->incentives = $request->incentives;
        }
        if (isset($request->salary_amount)) {
            $salary->salary_amount = $request->salary_amount;
        }

        $salary->save();

        return SalaryResource::make($salary);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salary $salary)
    {
        //
        $salary->delete();

        return response()->json([
            'success'=>true,
            'message'=>'Successfully deleted'
        ]);
    }
}
