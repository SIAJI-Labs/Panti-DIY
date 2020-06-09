<?php

namespace App\Http\Controllers\Cms;

use Hash;
use Auth;
use App\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('content.cms.profile.index');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'email', 'max:191', 'unique:users,email,'.$id],
            'username' => ['required', 'string', 'min:3', 'max:191', 'unique:users,email,'.$id],
        ]);

        $data = Auth::user();
        $data->name = $request->name;
        $data->username = $request->username;
        if($request->email != $data->email){
            $data->is_verified = false;
        }
        $data->email = $request->email;
        $data->save();

        return redirect()->route('cms.profile.index')->with([
            'status' => 'success',
            'message' => 'Successfully update User Profile'
        ]);
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:5', 'confirmed'],
            'old_password' => ['required', 'string']
        ]);
        $data = Auth::user();

        if(!(Hash::check($request->old_password, $data->password))){
            return response()->json([
                'status' => 'danger',
                'message' => 'error',
                'errors' => [
                    'old_password' => 'Old Password did not match'
                ]
            ], 422);
        } else if(Hash::check($request->password, $data->password)){
            return response()->json([
                'status' => 'danger',
                'message' => 'error',
                'errors' => [
                    'password' => 'Can not use Old Password as New Password'
                ]
            ], 422);
        } else {
            $data->password = Hash::make($request->password);
        }
        $data->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Password successfully changed',
            'data' => $data
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
