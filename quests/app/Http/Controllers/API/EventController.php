<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Event;
use Carbon\Carbon;

class EventController extends BaseController
{
    public function eventsByDate($questId, $date)
    {

//        $date = '2020-10-10';
//        dd($date);

        $from = Carbon::create($date)->startOfDay();
//        dd($from);
        $to = $from->copy()->addDays(6)->endOfDay();
        $events = Event::where('quest_id', '=', $questId)->whereBetween('event_date', [$from, $to])->get()->toArray();
//        dd($events);

        $shedule = [];

        $daysCountByWeek = 7;

        $hoursByDay = 24;

        $index = 0;

        while($index < $daysCountByWeek) {
            $day = $index === 0 ? $from->format('Y-m-d') : $from->addDay()->format('Y-m-d');

            $times = [];
            $timeIndex = 0;
            while($timeIndex < $hoursByDay) {
                $time = $timeIndex === 0 ? Carbon::create()->startOfDay()->format('H:i') : Carbon::create()->addHours($timeIndex)->format('H:i');
                $times[$time] = 'empty';

                $timeIndex++;

            }

            $shedule[$day] = $times;

            $index++;
        }

        foreach ($events as $event) {
            $eventDate = Carbon::create($event['event_date'])->format('Y-m-d');

            if (in_array($eventDate, array_keys($shedule))) {

                $eventTime = Carbon::create($event['event_date'])->format('H:i');
//                dd($eventTime);
                foreach ($shedule[$eventDate] as $time => $status) {
//                    dd($time);
                    if ($eventTime === $time) {
                        $shedule[$eventDate][$eventTime] = 'busy';
                    }
                }
            }
        }

        return $this->sendResponce($shedule, 'events');

    }

    public function update(Request $request, $eventId)
    {
        $status = $request->status;

        $event = Event::find($eventId);
        $event->status = $status;
        $event->save();

        return $this->sendResponce($event, 'events');
    }
}

