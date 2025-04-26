<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;

class ClientController extends Controller
{
    public function show(Client $client)
    {
        return response()->json([
            'status' => 'success',
            'data' => $client
        ]);
    }
}