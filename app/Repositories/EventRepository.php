<?php

namespace App\Repositories;

use App\Interfaces\EventRepositoryInterface;
use App\Models\Event;

class EventRepository implements EventRepositoryInterface
{
    public function getAllEventsWithUser()
    {
        // return Event::with(['user' => function ($user) {
        //     $user->select('id','name as user_name');
        // }])->get();
        $events =  Event::with('user:id,name')->get();

        return $events->map(function ($event) {
            return collect($event->toArray())
                ->only(['id', 'name', 'started_at', 'slug', 'user'])
                ->all();
        });
    }
}
