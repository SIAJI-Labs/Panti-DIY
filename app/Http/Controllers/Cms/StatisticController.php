<?php

namespace App\Http\Controllers\Cms;

use App\Models\Statistic;

use App\Http\Requests\StatisticRequest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('content.cms.feature-manager.statistic.index');
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
    public function store(StatisticRequest $request)
    {
        $data = new Statistic;
        $data->name = $request->name;
        $data->description = $request->description;
        $data->value = $request->value;
        $data->prefix = $request->prefix;
        $data->suffix = $request->suffix;
        $data->icon = $request->icon ?? 'fas fa-square';
        $data->save();

        if($request->ajax()){
            return response()->json([
                'status' => 'success',
                'message' => 'Statistic Count Successfully Stored'
            ]);
        }
        return redirect()->back()->with([
            'status' => 'success',
            'message' => 'Statistic Count Successfully Stored'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Statistic  $statistic
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Statistic  $statistic
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
     * @param  \App\Models\Statistic  $statistic
     * @return \Illuminate\Http\Response
     */
    public function update(StatisticRequest $request, $id)
    {
        $data = Statistic::findOrFail($id);
        $data->name = $request->name;
        $data->description = $request->description;
        $data->value = $request->value;
        $data->prefix = $request->prefix;
        $data->suffix = $request->suffix;
        $data->icon = $request->icon ?? 'fas fa-square';
        $data->save();

        if($request->ajax()){
            return response()->json([
                'status' => 'success',
                'message' => 'Statistic Count Successfully Updated'
            ]);
        }
        return redirect()->back()->with([
            'status' => 'success',
            'message' => 'Statistic Count Successfully Updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Statistic  $statistic
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Statistic::findOrFail($id);
        $data->delete();
        
        if(request()->ajax()){
            return response()->json([
                'status' => 'success',
                'message' => 'Statistic Count Successfully Deleted'
            ]);
        }
        return redirect()->back()->with([
            'status' => 'success',
            'message' => 'Statistic Count Successfully Deleted'
        ]);
    }
}
