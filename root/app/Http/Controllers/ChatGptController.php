<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Modules\Chatgpt;

class ChatGptController extends Controller
{

    /**
     * index
     *
     * @param  Request  $request
     */
    public function index(Request $request)
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
        $chat_response = $Chatgpt->chat_gpt("日本語で応答してください", $sentence);

        return view('chat', compact('sentence', 'chat_response'));
    }
}
