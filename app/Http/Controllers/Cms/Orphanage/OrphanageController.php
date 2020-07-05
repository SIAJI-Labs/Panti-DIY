<?php

namespace App\Http\Controllers\Cms\Orphanage;

use Storage;
use Carbon\Carbon;
use App\Models\Orphanage\Orphanage;

use App\Http\Requests\Orphanage\OrphanageStoreRequest;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orphanage\OrphanageUpdateRequest;
use Illuminate\Http\Request;

class OrphanageController extends Controller
{
    protected $file_location = 'images/orphanage';
    public function imageStore($file, $data = null)
    {
        if(!empty($data)){
            // If Second Parameter is not empty, delete old files
            Storage::delete($this->file_location.'/'.$data);
        }

        $uploadedFile = $file;        
        $size = getimagesize($uploadedFile);
        $filename = 'orphanage-'.(Carbon::now()->timestamp+rand(1,1000));
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
        return view('content.cms.orphanage.orphanage.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.cms.orphanage.orphanage.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrphanageStoreRequest $request)
    {
        $data = new Orphanage;
        $data->name = $request->name;
        $data->slug = $request->slug;
        $data->description = $request->description;
        
        if($request->hasFile('logo')){
            $logo = $this->imageStore($request->logo);
            $data->logo = $logo;
        }
        $data->save();

        return redirect()->route('cms.orphanage.index')->with([
            'status' => 'success',
            'message' => 'Successfully stored new Orphanage Data'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orphanage\Orphanage  $orphanage
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orphanage\Orphanage  $orphanage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Orphanage::findOrFail($id);
        return view('content.cms.orphanage.orphanage.edit', [
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orphanage\Orphanage  $orphanage
     * @return \Illuminate\Http\Response
     */
    public function update(OrphanageUpdateRequest $request, $id)
    {
        $data = Orphanage::findOrFail($id);
        $data->name = $request->name;
        $data->slug = $request->slug;
        $data->description = $request->description;
        
        if($request->hasFile('logo')){
            $logo = $this->imageStore($request->logo, $data->logo);
            $data->logo = $logo;
        }
        $data->save();

        return redirect()->route('cms.orphanage.index')->with([
            'status' => 'success',
            'message' => 'Successfully updated Orphanage Data'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orphanage\Orphanage  $orphanage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
