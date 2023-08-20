<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LeaveCreditStoreRequest;
use App\Http\Requests\LeaveCreditUpdateRequest;
use App\Http\Resources\LeaveCreditResource;
use App\Models\LeaveCredit;
use Illuminate\Http\Request;

class LeaveCreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return LeaveCreditResource::collection(LeaveCredit::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LeaveCreditStoreRequest $request)
    {
        //
        return LeaveCredit::create([
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
    public function show(LeaveCredit $leaveCredit)
    {
        return $leaveCredit;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LeaveCreditUpdateRequest $request, LeaveCredit $leaveCredit)
    {
        //

        if (isset($request->name)) {
            $leaveCredit->name = $request->name;
        }
      

        $leaveCredit->save();
        return LeaveCreditResource::make($leaveCredit);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeaveCredit $leaveCredit)
    {
        //
        $leaveCredit->delete();
        return response()->json([
            'success'=>true,
            'message'=>'Successfully deleted'
        ]);
    }
}
