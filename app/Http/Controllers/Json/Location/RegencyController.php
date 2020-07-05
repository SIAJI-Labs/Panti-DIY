<?php

namespace App\Http\Controllers\Json\Location;

use App\Http\Controllers\Controller;
use App\Models\Location\Regency;
use Illuminate\Http\Request;

class RegencyController extends Controller
{
    public function jsonAll()
    {
        $data = Regency::get();

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
        $data = Regency::query();
        $last_page = null;

        if($request->has('province_id') && $request->province_id != ''){
            // Apply Province if Request has Province ID
            $data = $data->where('province_id', $request->province_id);
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
