<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AiAgents\EduHelperAgent;
use LarAgent\Messages\UserMessage;

class ChatController extends Controller
{
   
    public function view()
    {
        return view('chat');
    }

    public function chat(Request $request)
    {
        try {
            $message = $request->input('message');

            $agent = new EduHelperAgent();

            $reply = $agent->respond(new UserMessage($message));

            return response()->json([
                'reply' => $reply
            ]);

        } catch (\OpenAI\Exceptions\ErrorException $e) {
            return response()->json([
                'reply' => "API Error: ".$e->getMessage()
            ]);
        } catch (\OpenAI\Exceptions\RateLimitException $e) {
            return response()->json([
                'reply' => "Rate limit reached. Please wait 😊"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'reply' => "Unexpected Error: ".$e->getMessage()
            ]);
        }
    }
}
