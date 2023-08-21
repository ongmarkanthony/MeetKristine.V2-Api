<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LeaveProposalStoreRequest;
use App\Http\Requests\LeaveProposalUpdateRequest;
use App\Http\Resources\LeaveProposalResource;
use App\Models\LeaveProposal;
use App\Models\Request;

class LeaveProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return LeaveProposalResource::collection(LeaveProposal::all());
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
    public function store(LeaveProposalStoreRequest $request)
    {
        //
        return LeaveProposal::create([
            'user_id'=>$request->user_id,
            'leave_type'=>$request->leave_type,
            'requested_date'=>$request->requested_date,
            'type'=>$request->type
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(LeaveProposal $leaveProposal)
    {
        //
        return LeaveProposalResource::make($leaveProposal);
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
    public function update(LeaveProposalUpdateRequest $request, LeaveProposal $leaveProposal)
    {
        //
        if (isset($request->user_id)) {
            $leaveProposal->user_id = $request->user_id;
        }
        if (isset($request->requested_date)) {
            $leaveProposal->requested_date = $request->requested_date;
        }
        if (isset($request->leave_type)) {
            $leaveProposal->leave_type = $request->leave_type;
        }
        if (isset($request->type)) {
            $leaveProposal->type = $request->type;
        }

        $leaveProposal->save();
        
        return LeaveProposalResource::make($leaveProposal);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeaveProposal $leaveProposal)
    {
        //
        $leaveProposal->delete();

        return response()->json([
            'success'=>true,
            'message'=>'Successfully deleted'
        ]);
    }
}
