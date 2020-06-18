<?php

namespace App\Http\Controllers\Json;

use App\Models\SocialAccount;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SocialAccountController extends Controller
{
    public function jsonAll()
    {
        $data = SocialAccount::get();

        return response()->json([
            'status' => 'success',
            'message' => 'Data Fetched',
            'data' => $data
        ]);
    }

    public function jsonId($id)
    {
        $data = SocialAccount::findOrFail($id);

        return response()->json([
            'status' => 'success',
            'message' => 'Data Fetched',
            'data' => $data
        ]);
    }
}
