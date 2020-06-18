<?php

namespace App\Http\Controllers\Json\Datatable;

use App\Models\ContactData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactDataController extends Controller
{
    public function datatableAll(Request $request)
    {
        $data = ContactData::query();

        return datatables()
            ->of($data)
            ->toJson();
    }
}
