<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LeaveTypeStoreRequest;
use App\Http\Requests\LeaveTypeUpdateRequest;
use App\Http\Resources\LeaveTypeResource;
use App\Models\LeaveType;
use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        return LeaveTypeResource::collection(LeaveType::paginate(10));
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
    public function store(LeaveTypeStoreRequest $request)
    {
        //
        return LeaveTypeResource::make(
            LeaveType::create([
                'name'=>$request->name,
                'available_credit'=>$request->available_credit,
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
    public function show(LeaveType $leaveType)
    {
        //
        return LeaveTypeResource::make($leaveType);
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
    public function update(LeaveTypeUpdateRequest $request, LeaveType $leaveType)
    {
        //
        if (isset($request->name)) {
            $leaveType->name = $request->name;
        }
        if (isset($request->available_credit)) {
            $leaveType->available_credit = $request->available_credit;
        }
        if (isset($request->user_id)) {
            $leaveType->user_id = $request->user_id;
        }

        $leaveType->save();

        return LeaveTypeResource::make($leaveType);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeaveType $leaveType)
    {
        //
        $leaveType->delete();
        return response()->json([
            'success'=>true,
            'message'=>'Successfully deleted',
        ]);
    }
}
