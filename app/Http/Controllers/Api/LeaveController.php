<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LeaveStoreRequest;
use App\Http\Requests\LeaveUpdateRequest;
use App\Http\Resources\LeaveResource;
use App\Models\Leave;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return LeaveResource::collection(Leave::paginate(10));
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
    public function store(LeaveStoreRequest $request)
    {
        //
        return Leave::create([
            'user_id'=>$request->user_id,
            'name'=>$request->name,
            'credit_needed'=>$request->credit_needed,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Leave $leave)
    {
        //
        return $leave;
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
    public function update(LeaveUpdateRequest $request, Leave $leave)
    {
        //

        if (isset($request->user_id)) {
            $leave->user_id = $request->user_id;
        }
        if (isset($request->name)) {
            $leave->name = $request->name;
        }
        if (isset($request->credit_needed)) {
            $leave->credit_needed = $request->credit_needed;
        }

        $leave->save();
        return LeaveResource::make($leave);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leave $leave)
    {
        //
        $leave->delete();
        return response()->json([
            'success'=>true,
            'message'=>'Successfully deleted'
        ]);
    }
}
