<?php

namespace App\Modules;

use Illuminate\Support\Facades\Http;

class Chatgpt
{
    protected $url;
    protected $api_key;
    protected $headers;

    public function __construct()
    {
        // ChatGPT APIのエンドポイントURL
        $this->url = "https://api.openai.com/v1/chat/completions";

        // APIキー
        $this->api_key = env('CHAT_GPT_KEY');

        // ヘッダー
        $this->headers = array(
            "Content-Type" => "application/json",
            "Authorization" => "Bearer $this->api_key"
        );
    }

    public function chat_gpt($system, $user)
    {
        // パラメータ
        $data = array(
            "model" => "gpt-3.5-turbo",
            "messages" => [
                [
                    "role" => "system",
                    "content" => $system
                ],
                [
                    "role" => "user",
                    "content" => $user
                ]
            ]
        );

        $response = Http::withHeaders($this->headers)->post($this->url, $data);

        if ($response->json('error')) {
            // エラー
            return $response->json('error')['message'];
        }

        return $response->json('choices')[0]['message']['content'];    }
}
