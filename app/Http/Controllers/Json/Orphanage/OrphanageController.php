<?php

namespace App\Http\Controllers\Json\Orphanage;

use App\Models\Orphanage\Orphanage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrphanageController extends Controller
{
    public function jsonAll()
    {
        $data = Orphanage::get();

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
        $data = Orphanage::query();
        $last_page = null;
        
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
