<?php

namespace App\Modules;

use Illuminate\Support\Carbon;
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

    public function createSchedule(Object $scheduleData) {
        $date = new Carbon($scheduleData->date);

        $event = new Event;
        $event->name = $scheduleData->title;
        $event->startDateTime = $date;
        $event->endDateTime = $date->addHour();   // 1時間後
        $event->description = $scheduleData->description;
        $event->save();
    }
}
