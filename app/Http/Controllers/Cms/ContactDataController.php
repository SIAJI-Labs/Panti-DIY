<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactDataRequest;
use App\Models\ContactData;
use Illuminate\Http\Request;

class ContactDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('content.cms.setting.contact-data.index');
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
    public function store(ContactDataRequest $request)
    {
        $data = new ContactData;
        $data->name = $request->name;
        $data->type = $request->type;
        $data->value = ($request->type == 'email' || $request->type == 'phone' ? $request->value : ($request->type == 'whatsapp' ? $request->whatsapp : $request->longitude.', '.$request->latitude));
        $data->save();

        if($request->ajax()){
            return response()->json([
                'status' => 'success',
                'message' => 'Contact Data Successfully Stored'
            ]);
        }
        return redirect()->back()->with([
            'status' => 'success',
            'message' => 'Contact Data Successfully Stored'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactData  $contactData
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactData  $contactData
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
     * @param  \App\Models\ContactData  $contactData
     * @return \Illuminate\Http\Response
     */
    public function update(ContactDataRequest $request, $id)
    {
        $data = ContactData::findOrFail($id);
        $data->name = $request->name;
        $data->type = $request->type;
        $data->value = ($request->type == 'email' || $request->type == 'phone' ? $request->value : ($request->type == 'whatsapp' ? $request->whatsapp : $request->longitude.', '.$request->latitude));
        $data->save();

        if($request->ajax()){
            return response()->json([
                'status' => 'success',
                'message' => 'Contact Data Successfully Updated'
            ]);
        }
        return redirect()->back()->with([
            'status' => 'success',
            'message' => 'Contact Data Successfully Updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactData  $contactData
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ContactData::findOrFail($id);
        $data->delete();

        if(request()->ajax()){
            return response()->json([
                'status' => 'success',
                'message' => 'Contact Data Successfully Deleted'
            ]);
        }
        return redirect()->back()->with([
            'status' => 'success',
            'message' => 'Contact Data Successfully Deleted'
        ]);
    }
}
