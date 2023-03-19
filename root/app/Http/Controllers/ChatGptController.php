<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Modules\Chatgpt;
use App\Modules\Constants\GptSystemConstants;

class ChatGptController extends Controller
{

    /**
     * index
     */
    public function index()
    {
        return view('chat');
    }

    /**
     * chat
     *
     * @param  Request  $request
     */
    public function chat(Request $request)
    {
        // バリデーション
        $request->validate([
            'sentence' => 'required',
        ]);

        // 文章
        $sentence = $request->input('sentence');

        // ChatGPT API処理
        $Chatgpt = new Chatgpt();
        $system = GptSystemConstants::CHAT_ASSISTANT_SYSTEM_MESSAGE;
        $chat_response = $Chatgpt->chatExec($system, $sentence);

        return view('chat', compact('sentence', 'chat_response'));
    }
}
