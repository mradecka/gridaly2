<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Interfaces\EventRepositoryInterface;
use Illuminate\Http\JsonResponse;

class EventController extends Controller
{
    private EventRepositoryInterface $eventRepository;

    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }
    public function index(): JsonResponse
    {
        return response()->json([
            'events' => $this->eventRepository->getAllEventsWithUser()
        ]);
    }
    public function store(): JsonResponse
    {
        return response()->json(['message' => 'Event created succeful by autorized user!'], 201);
    }

    public function update(): JsonResponse
    {
        return response()->json(['message' => 'Event changed succeful by autorized user!'], 200);
    }
}
