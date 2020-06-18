<?php

namespace App\Http\Controllers\Cms;

use App\Models\SocialAccount;
use App\Models\SocialPlatform;

use App\Http\Requests\SocialAccountRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SocialAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $platforms = SocialPlatform::orderBy('name', 'asc')->get();
        return view('content.cms.social-media.social-account.index', [
            'platforms' => $platforms
        ]);
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
    public function store(SocialAccountRequest $request)
    {
        $data = new SocialAccount;
        $data->platform_id = $request->platform_id;
        $data->name = $request->name;
        $data->link = $request->link;
        $data->save();

        if($request->ajax()){
            return response()->json([
                'status' => 'success',
                'message' => 'Social Account Successfully Stored'
            ]);
        }
        return redirect()->back()->with([
            'status' => 'success',
            'message' => 'Social Account Successfully Stored'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SocialAccount  $socialAccount
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SocialAccount  $socialAccount
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
     * @param  \App\Models\SocialAccount  $socialAccount
     * @return \Illuminate\Http\Response
     */
    public function update(SocialAccountRequest $request, $id)
    {
        $data = SocialAccount::findOrFail($id);
        $data->platform_id = $request->platform_id;
        $data->name = $request->name;
        $data->link = $request->link;
        $data->save();

        if($request->ajax()){
            return response()->json([
                'status' => 'success',
                'message' => 'Social Account Successfully Updated'
            ]);
        }
        return redirect()->back()->with([
            'status' => 'success',
            'message' => 'Social Account Successfully Updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SocialAccount  $socialAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = SocialAccount::findOrFail($id);
        $data->delete();

        if(request()->ajax()){
            return response()->json([
                'status' => 'success',
                'message' => 'Social Account Successfully Deleted'
            ]);
        }
        return redirect()->back()->with([
            'status' => 'success',
            'message' => 'Social Account Successfully Deleted'
        ]);
    }
}
