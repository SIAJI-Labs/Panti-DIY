<?php

namespace App\Http\Controllers\Json\Datatable;

use App\Models\SocialAccount;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SocialAccountController extends Controller
{
    public function datatableAll(Request $request)
    {
        $data = SocialAccount::query();

        return datatables()
            ->of($data)
            ->toJson();
    }
}
