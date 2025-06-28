<?php

namespace App\Http\Controllers;

use App\Repositories\EventRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EventController extends Controller
{
    protected $eventRepo;

    public function __construct(EventRepositoryInterface $eventRepo)
    {
        $this->eventRepo = $eventRepo;
    }

    // 1. Bütün eventləri göstər
    public function index()
    {
        $events = $this->eventRepo->all();
        return response()->json($events);
    }

    // 2. Bir eventin detalını göstər
    public function show($id)
    {
        try {
            $event = $this->eventRepo->find($id);
            return response()->json($event);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Event tapılmadı'], 404);
        }
    }

    // 3. Yeni event yarat
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $event = $this->eventRepo->create($validated);

        return response()->json([
            'message' => 'Event uğurla yaradıldı',
            'event' => $event
        ], 201);
    }

    // 4. Mövcud eventi yenilə
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'sometimes|required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        try {
            $event = $this->eventRepo->update($id, $validated);

            return response()->json([
                'message' => 'Event uğurla yeniləndi',
                'event' => $event
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Event tapılmadı'], 404);
        }
    }

    // 5. Event sil
    public function destroy($id)
    {
        try {
            $this->eventRepo->delete($id);
            return response()->json(['message' => 'Event uğurla silindi']);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Event tapılmadı'], 404);
        }
    }
}
// This controller handles the CRUD operations for events using the EventRepositoryInterface.