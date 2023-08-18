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
    public function index()
    {
        return UserResource::collection(User::paginate(10));
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
        return UserResource::make(
            User::create([
                'employee_id' => $request->employee_id,
                'password' => bcrypt($request->password)
            ])
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
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
    public function update(UserUpdateRequest $request, User $user)
    {
        //
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
        if (isset($request->postalCode)) {
            $user->postalCode = $request->postalCode;
        }
        if (isset($request->bankName)) {
            $user->bankName = $request->bankName;
        }
        if (isset($request->bankAccount)) {
            $user->bankAccount = $request->bankAccount;
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
    public function destroy(User $user)
    {
        //
        $user->delete();
        return response()->json([
            'success' => true,
            'message' => 'Successfully deleted'
        ]);
    }
}
