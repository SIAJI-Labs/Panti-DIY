<?php

namespace App\Http\Controllers\Json;

use App\Models\ContactData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactDataController extends Controller
{
    public function jsonAll()
    {
        $data = ContactData::get();

        return response()->json([
            'status' => 'success',
            'message' => 'Data Fetched',
            'data' => $data
        ]);
    }

    public function jsonId($id)
    {
        $data = ContactData::findOrFail($id);

        return response()->json([
            'status' => 'success',
            'message' => 'Data Fetched',
            'data' => $data
        ]);
    }
}
