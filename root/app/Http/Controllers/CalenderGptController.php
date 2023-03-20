<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;

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
        $chatResponse = $Chatgpt->chatExec($system, $sentence);

        //カレンダー操作が行われる場合、JSONでレスポンスがくるので、オブジェクトに直す
        $chatResponseObj = json_decode($chatResponse);

        if (!$chatResponseObj) {
            //カレンダー操作に関連しない入力があった場合、通常レスポンスを返す
            return view('calender', compact('sentence', 'chatResponse'));
        }

        //GPTのレスポンスによってGoogleカレンダーを操作する。
        $GoogleCalenderOperation = new GoogleCalendarOperation();

        switch ($chatResponseObj->output) {
            case 'getFutureSchedule':
                $futureSchedule = $GoogleCalenderOperation->getFutureSchedule();
                return view('calender', ['futureSchedule' => $futureSchedule]);
                break;

            case 'createSchedule':
                try {
                    $GoogleCalenderOperation->createSchedule($chatResponseObj);

                    // 予定追加した旨を通知する
                    $result = '予定を追加しました';
                    return view('calender', compact('chatResponseObj', 'result'));
                } catch (Exception $e) {
                    // エラー時
                    $result = '予定を追加できませんでした';
                    return view('calender', compact('chatResponseObj', 'result', 'e'));
                }
                break;

            default:
                // 処理が見つからない場合
                return response('処理が見つかりませんでした。', 404);
                break;
        }

    }
}

