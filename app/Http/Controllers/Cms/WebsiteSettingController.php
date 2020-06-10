<?php

namespace App\Http\Controllers\Cms;

use Storage;
use Carbon\Carbon;
use App\Models\WebsiteSetting;

use App\Http\Requests\WebsiteSettingRequest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebsiteSettingController extends Controller
{
    protected $file_location = 'images';
    public function imageStore($file, $data = null)
    {
        if(!empty($data)){
            // If Second Parameter is not empty, delete old files
            Storage::delete($this->file_location.'/'.$data);
        }

        $uploadedFile = $file;        
        $size = getimagesize($uploadedFile);
        $filename = 'setting-'.(Carbon::now()->timestamp+rand(1,1000));
        $fullname = $filename.'.'.strtolower($uploadedFile->getClientOriginalExtension());
        $filesize = $uploadedFile->getSize();
        $path = $uploadedFile->storeAs($this->file_location, $fullname);

        return $fullname;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wp_title = WebsiteSetting::where([
            'type' => 'public',
            'key' => 'website_title'
        ])->first();
        $wp_description = WebsiteSetting::where([
            'type' => 'public',
            'key' => 'website_description'
        ])->first();
        $wp_logo = WebsiteSetting::where([
            'type' => 'public',
            'key' => 'website_logo'
        ])->first();
        $wp_favicon = WebsiteSetting::where([
            'type' => 'public',
            'key' => 'website_favicon'
        ])->first();

        $wc_title = WebsiteSetting::where([
            'type' => 'cms',
            'key' => 'website_title'
        ])->first();
        $wc_description = WebsiteSetting::where([
            'type' => 'cms',
            'key' => 'website_description'
        ])->first();
        $wc_logo = WebsiteSetting::where([
            'type' => 'cms',
            'key' => 'website_logo'
        ])->first();
        $wc_favicon = WebsiteSetting::where([
            'type' => 'cms',
            'key' => 'website_favicon'
        ])->first();

        return view('content.cms.setting.website-setting.index', [
            'wp_title' => $wp_title,
            'wp_description' => $wp_description,
            'wp_logo' => $wp_logo,
            'wp_favicon' => $wp_favicon,

            'wc_title' => $wc_title,
            'wc_description' => $wc_description,
            'wc_logo' => $wc_logo,
            'wc_favicon' => $wc_favicon,
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
    public function store(WebsiteSettingRequest $request)
    {
        $wp_logo = WebsiteSetting::where([
            'type' => $request->type,
            'key' => 'website_logo'
        ])->first();
        $wp_favicon = WebsiteSetting::where([
            'type' => $request->type,
            'key' => 'website_favicon'
        ])->first();

        // Store/Update Title
        WebsiteSetting::updateOrCreate([
            'key' => 'website_title',
            'type' => $request->type,
        ], [
            'name' => ucwords($request->type).' Website Title',
            'value' => $request->title[$request->type]
        ]);

        // Store/Update Description
        WebsiteSetting::updateOrCreate([
            'key' => 'website_description',
            'type' => $request->type,
        ], [
            'name' => ucwords($request->type).' Website Description',
            'value' => $request->description[$request->type]
        ]);

        // Store/Update Logo
        if($request->hasFile('logo.'.$request->type)){
            if(!empty($wp_logo)){
                $image = $this->imageStore($request->file('logo.'.$request->type), $wp_logo->value);
            } else {
                $image = $this->imageStore($request->file('logo.'.$request->type));
            }
            WebsiteSetting::updateOrCreate([
                'key' => 'website_logo',
                'type' => $request->type,
            ], [
                'name' => ucwords($request->type).' Website Logo',
                'value' => $image
            ]);
        }

        // Store/Update Favicon
        if($request->hasFile('favicon.'.$request->type)){
            if(!empty($wp_favicon)){
                $image = $this->imageStore($request->file('favicon.'.$request->type), $wp_favicon->value);
            } else {
                $image = $this->imageStore($request->file('favicon.'.$request->type));
            }
            WebsiteSetting::updateOrCreate([
                'key' => 'website_favicon',
                'type' => $request->type,
            ], [
                'name' => ucwords($request->type).' Website Favicon',
                'value' => $image
            ]);
        }

        return redirect()->route('cms.website-setting.index')->with([
            'status' => 'success',
            'message' => 'Successfully '.($request->action[$request->type] == 'update' ? 'update' : 'add').' '.ucwords($request->type).' Website Setting'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WebsiteSetting  $websiteSetting
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebsiteSetting  $websiteSetting
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
     * @param  \App\Models\WebsiteSetting  $websiteSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WebsiteSetting  $websiteSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
