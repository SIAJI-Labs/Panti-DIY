<?php

namespace App\Http\Controllers\Json\Location;

use App\Models\Location\District;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function jsonAll()
    {
        $data = District::get();

        return response()->json([
            'status' => 'success',
            'message' => 'Data Fetched',
            'data' => $data
        ]);
    }

    /**
     * Select2
     * 
     */
    public function selectAll(Request $request)
    {
        $data = District::query();
        $last_page = null;

        if($request->has('regency_id') && $request->regency_id != ''){
            // Apply Regency if Request has Regency ID
            $data = $data->where('regency_id', $request->regency_id);
        }
        
        if($request->has('search') && $request->search != ''){
            // Apply search param
            $data = $data->where('name', 'like', '%'.$request->search.'%');
        }

        if($request->has('page')){
            // If request has page parameter, add paginate to eloquent
            $data->paginate(10);
            // Get last page
            $last_page = $data->paginate(10)->lastPage();
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Data Fetched',
            'data' => $data->get(),
            'last_page' => $last_page
        ]);
    }
}
