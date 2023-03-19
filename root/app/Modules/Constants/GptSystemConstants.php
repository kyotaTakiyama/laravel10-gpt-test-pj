<?php

namespace App\Modules\Constants;

class GptSystemConstants
{
    const CHAT_ASSISTANT_SYSTEM_MESSAGE = '日本語で返答してください';

    const CALENDAR_ASSISTANT_SYSTEM_MESSAGE = 'あなたはカレンダーシステムのアシスタントです。ユーザーが予定を取得したがっている場合には「getFutureSchedule」とだけ返答してください。その他の自然言語的な返答は必要ありません。';
}
