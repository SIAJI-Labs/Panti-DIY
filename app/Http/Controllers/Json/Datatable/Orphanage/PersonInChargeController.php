<?php

namespace App\Http\Controllers\Json\Datatable\Orphanage;

use App\Models\Orphanage\OrphanagePic;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersonInChargeController extends Controller
{
    public function datatableAll(Request $request)
    {
        $data = OrphanagePic::query();

        return datatables()
            ->of($data->with('orphanage'))
            ->toJson();
    }
}
