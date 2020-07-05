<?php

namespace App\Http\Controllers\Json\Datatable\Orphanage;

use App\Models\Orphanage\Orphanage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrphanageController extends Controller
{
    public function datatableAll(Request $request)
    {
        $data = Orphanage::query();

        return datatables()
            ->of($data)
            ->toJson();
    }
}
