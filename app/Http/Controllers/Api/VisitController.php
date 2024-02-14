<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate(
            [
                "building_id" => "required",
                "ip_address" => "required|string|max:255",
                "time" => "required",
            ]
        );

        $new_visit = Visit::create($data);

        return response()->json(['message' => 'Indirizzo IP memorizzato con successo']);
    }
}
