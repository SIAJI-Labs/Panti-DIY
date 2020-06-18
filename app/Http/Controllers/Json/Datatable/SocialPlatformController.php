<?php

namespace App\Http\Controllers\Json\Datatable;

use App\Models\SocialPlatform;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SocialPlatformController extends Controller
{
    public function datatableAll(Request $request)
    {
        $data = SocialPlatform::query();

        return datatables()
            ->of($data->withCount('socialAccount'))
            ->toJson();
    }
}
