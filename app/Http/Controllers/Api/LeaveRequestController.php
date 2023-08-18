<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LeaveRequestStoreRequest;
use App\Http\Requests\LeaveRequestUpdateRequest;
use App\Http\Resources\LeaveRequestResource;
use App\Http\Resources\LeaveTypeResource;
use App\Models\LeaveRequest;
use App\Models\LeaveType;
use Illuminate\Http\Request;

class LeaveRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return LeaveRequestResource::collection(LeaveRequest::paginate(10));
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
    public function store(LeaveRequestStoreRequest $request)
    {
        //
        return LeaveTypeResource::make([
            LeaveType::create([
                'user_id'=>$request->user_id,
                'leave_types_id'=>$request->leave_types_id,
                'status'=>$request->status,
                'request_date'=>$request->request_date,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
            ])
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(LeaveRequest $leaveRequest)
    {
        //
        return $leaveRequest;
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
    public function update(LeaveRequestUpdateRequest $request, LeaveRequest $leaveRequest)
    {
        //
        if (isset($request->user_id)) {
            $leaveRequest->user_id = $request->user_id;
        }
        if (isset($request->leave_types_id)) {
            $leaveRequest->leave_types_id = $request->leave_types_id;
        }
        if (isset($request->status)) {
            $leaveRequest->status = $request->status;
        }
        if (isset($request->request_date)) {
            $leaveRequest->request_date = $request->request_date;
        }
        if (isset($request->start_date)) {
            $leaveRequest->start_date = $request->start_date;
        }
        if (isset($request->end_date)) {
            $leaveRequest->end_date = $request->end_date;
        }

        $leaveRequest->save();

        return LeaveRequestResource::make($leaveRequest);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeaveRequest $leaveRequest)
    {
        //
        $leaveRequest->delete();
        return response()->json([
            'success'=>true,
            'message'=>'Successfully deleted'
        ]);

    }
}
