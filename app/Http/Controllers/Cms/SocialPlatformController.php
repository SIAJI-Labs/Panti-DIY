<?php

namespace App\Http\Controllers\Cms;

use App\Models\SocialPlatform;

use App\Http\Requests\SocialPlatformRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SocialPlatformController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('content.cms.social-media.social-platform.index');
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
    public function store(SocialPlatformRequest $request)
    {
        $data = new SocialPlatform;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->icon = $request->icon;
        $data->save();

        if($request->ajax()){
            return response()->json([
                'status' => 'success',
                'message' => 'Social Platform Successfully Stored'
            ]);
        }
        return redirect()->back()->with([
            'status' => 'success',
            'message' => 'Social Platform Successfully Stored'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SocialPlatform  $socialPlatform
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SocialPlatform  $socialPlatform
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
     * @param  \App\Models\SocialPlatform  $socialPlatform
     * @return \Illuminate\Http\Response
     */
    public function update(SocialPlatformRequest $request, $id)
    {
        $data = SocialPlatform::findOrFail($id);
        $data->name = $request->name;
        $data->description = $request->description;
        $data->icon = $request->icon;
        $data->save();

        if($request->ajax()){
            return response()->json([
                'status' => 'success',
                'message' => 'Social Platform Successfully Updated'
            ]);
        }
        return redirect()->back()->with([
            'status' => 'success',
            'message' => 'Social Platform Successfully Updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SocialPlatform  $socialPlatform
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = SocialPlatform::findOrFail($id);
        if($data->socialAccount()->exists()){
            $data->socialAccount()->delete();
        }
        $data->delete();

        if(request()->ajax()){
            return response()->json([
                'status' => 'success',
                'message' => 'Social Platform Successfully Deleted'
            ]);
        }
        return redirect()->back()->with([
            'status' => 'success',
            'message' => 'Social Platform Successfully Deleted'
        ]);
    }
}
