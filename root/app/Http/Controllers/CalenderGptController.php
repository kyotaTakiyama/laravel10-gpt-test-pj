<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Modules\Chatgpt;
use App\Modules\GoogleCalendarOperation;
use App\Modules\Constants\GptSystemConstants;

class CalenderGptController extends Controller
{
    /**
     * index
     */
    public function index()
    {
        return view('calender');
    }

    /**
     * calender
     *
     * @param  Request  $request
     */
    public function calender(Request $request)
    {
        // バリデーション
        $request->validate([
            'sentence' => 'required',
        ]);

        // 文章
        $sentence = $request->input('sentence');

        // ChatGPT API処理
        $Chatgpt = new Chatgpt();
        $system =  GptSystemConstants::CALENDAR_ASSISTANT_SYSTEM_MESSAGE;
        $chat_response = $Chatgpt->chatExec($system, $sentence);

        $GoogleCalenderOperation = new GoogleCalendarOperation();
        //GPTのレスポンスによってGoogleカレンダーを操作する。
        if ($chat_response === 'getFutureSchedule') {
            $futureSchedule = $GoogleCalenderOperation->getFutureSchedule();
            // calender.blade.phpに変数を渡して表示する
            return view('calender', ['futureSchedule' => $futureSchedule]);
        }

        //カレンダー操作に関連しない入力があった際には通常レスポンスを返す
        return view('calender', compact('sentence', 'chat_response'));
    }
}

