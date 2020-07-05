<?php

namespace App\Http\Controllers\Cms\Orphanage;

use App\Models\Orphanage\OrphanagePic;

use App\Http\Requests\Orphanage\PersonInChargeStoreRequest;

use App\Http\Controllers\Controller;
use App\Http\Requests\Orphanage\PersonInChargeUpdateRequest;
use Illuminate\Http\Request;

class PersonInChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('content.cms.orphanage.orphanage-pic.index');
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
    public function store(PersonInChargeStoreRequest $request)
    {
        $data = new OrphanagePic;
        $data->orphanage_id = $request->orphanage_id;
        $data->name = $request->name;
        $data->type = $request->type;
        switch($request->type){
            case 'mobile':
                $data->contact = $request->mobile;
                break;
            case 'whatsapp':
                $data->contact = $request->whatsapp;
            break;
            default: 
                $data->contact = $request->contact;
                break;
        }
        $data->save();

        if($request->ajax()){
            return response()->json([
                'status' => 'success',
                'message' => 'Orphanage PIC Successfully Stored'
            ]);
        }
        return redirect()->back()->with([
            'status' => 'success',
            'message' => 'Orphanage PIC Successfully Stored'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orphanage\OrphanagePic  $orphanagePic
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orphanage\OrphanagePic  $orphanagePic
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
     * @param  \App\Models\Orphanage\OrphanagePic  $orphanagePic
     * @return \Illuminate\Http\Response
     */
    public function update(PersonInChargeUpdateRequest $request, $id)
    {
        $data = OrphanagePic::findOrFail($id);
        $data->orphanage_id = $request->orphanage_id;
        $data->name = $request->name;
        $data->type = $request->type;
        switch($request->type){
            case 'mobile':
                $data->contact = $request->mobile;
                break;
            case 'whatsapp':
                $data->contact = $request->whatsapp;
            break;
            default: 
                $data->contact = $request->contact;
                break;
        }
        $data->save();

        if($request->ajax()){
            return response()->json([
                'status' => 'success',
                'message' => 'Orphanage PIC Successfully Updated'
            ]);
        }
        return redirect()->back()->with([
            'status' => 'success',
            'message' => 'Orphanage PIC Successfully Updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orphanage\OrphanagePic  $orphanagePic
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
