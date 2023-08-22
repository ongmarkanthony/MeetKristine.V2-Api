<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TimeEventStoreRequest;
use App\Http\Requests\TimeEventUpdateRequest;
use App\Http\Resources\TimeEventResource;
use App\Http\Resources\UserResource;
use App\Models\TimeEvent;
use Illuminate\Http\Request;

class TimeEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return TimeEventResource::collection(TimeEvent::paginate(10));
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TimeEventStoreRequest $request)
    {
        //
        return TimeEvent::create([
            'id'=>$request->id,
            'user_id'=>$request->user_id,
            'time_in'=>$request->time_in,
            'time_out'=>$request->time_out,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TimeEvent $timeEvent)
    {
        //
        return $timeEvent;
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TimeEventUpdateRequest $request, TimeEvent $timeEvent )
    {
        //
        if (isset($request->user_id)) {
            $timeEvent->user_id = $request->user_id;
        }
        if (isset($request->time_in)) {
            $timeEvent->time_in = $request->time_in;
        }
        if (isset($request->time_out)) {
            $timeEvent->time_out = $request->time_out;
        }

        $timeEvent->save();

        return TimeEventResource::make($timeEvent);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TimeEvent $timeEvent)
    {
        //
        $timeEvent->delete();

        return response()->json([
            'success'=>true,
            'message'=>'Successfully deleted'
        ]);

    }
}
