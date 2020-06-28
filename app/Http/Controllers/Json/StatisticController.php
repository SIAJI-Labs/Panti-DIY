<?php

namespace App\Http\Controllers\Json;

use App\Models\Statistic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function jsonAll()
    {
        $data = Statistic::get();

        return response()->json([
            'status' => 'success',
            'message' => 'Data Fetched',
            'data' => $data
        ]);
    }

    public function jsonId($id)
    {
        $data = Statistic::findOrFail($id);

        return response()->json([
            'status' => 'success',
            'message' => 'Data Fetched',
            'data' => $data
        ]);
    }
}
