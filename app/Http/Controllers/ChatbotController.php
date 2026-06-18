<?php

namespace App\Http\Controllers;

use App\Ai\Agents\GilgitTravelAssistant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ChatbotController extends Controller
{
    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:500',
        ]);

        $provider = config('ai.default');
        $providerKey = config("ai.providers.{$provider}.key");
        if (empty($providerKey)) {
            return response()->json([
                'reply' => 'AI is not configured. Please set the API key in your .env file.',
            ], 500);
        }

        $userMessage = $request->input('message');

        try {
            $response = (new GilgitTravelAssistant())->prompt($userMessage);

            return response()->json(['reply' => (string) $response]);
        } catch (\Throwable $e) {
            $errorId = (string) Str::uuid();
            Log::error('Chatbot request failed.', [
                'error_id' => $errorId,
                'exception' => get_class($e),
                'message' => $e->getMessage(),
            ]);
            return response()->json([
                'reply' => "Our connection dropped. Please try again later. Error ID: {$errorId}",
            ], 500);
        }
    }
}
