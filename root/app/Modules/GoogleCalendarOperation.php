<?php

namespace App\Modules;

use Spatie\GoogleCalendar\Event;

class GoogleCalendarOperation
{
    public function __construct()
    {
    }

    public function getFutureSchedule()
    {
        $events = Event::get(); // 未来の全イベントを取得する

        // 今後の予定を取得する処理を実行する
        $futureSchedule = [];
        foreach ($events as $event) {
            $futureSchedule[] = [
                'id' => $event->id,
                'name' => $event->name,
                'description' => $event->description,
                'startDateTime' => $event->startDateTime,
                'endDateTime' => $event->endDateTime,
            ];
        }
        return $futureSchedule;
    }
}
