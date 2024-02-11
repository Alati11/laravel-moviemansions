<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request) {
        $data = $request->all();

        $request->validate(
            [
                "name" => "required|string|max:255",
                "surname" => "required|string|max:255",
                "text" => "required|string",
                "guest_email" => "required|email|max:255",
            ]
        );

        $new_message = Message::create($data);

        return response()->json([
            'response' => "il messaggio è stato inviato correttamente!"
        ]);
    }
}
