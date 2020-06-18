<?php

namespace App\Http\Controllers\Json;

use App\Models\SocialPlatform;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SocialPlatformController extends Controller
{
    public function jsonAll()
    {
        $data = SocialPlatform::withCount('socialAccount')->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Data Fetched',
            'data' => $data
        ]);
    }

    public function jsonId($id)
    {
        $data = SocialPlatform::withCount('socialAccount')->findOrFail($id);

        return response()->json([
            'status' => 'success',
            'message' => 'Data Fetched',
            'data' => $data
        ]);
    }
}
