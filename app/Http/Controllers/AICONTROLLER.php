<?php

use Illuminate\Support\Facades\Http;
class AIController extends Controller
{

    public function ask(Request $request)
    {

        $response = Http::post('http://127.0.0.1:8001/ask', [
            'question' => $request->message
        ]);

        return $response->json();

    }

}
