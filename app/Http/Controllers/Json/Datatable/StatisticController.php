<?php

namespace App\Http\Controllers\Json\Datatable;

use App\Models\Statistic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function datatableAll(Request $request)
    {
        $data = Statistic::query();

        return datatables()
            ->of($data)
            ->toJson();
    }
}
