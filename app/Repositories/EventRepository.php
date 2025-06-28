<?php

namespace App\Repositories;

use App\Models\Event;

class EventRepository implements EventRepositoryInterface
{
    protected $model;

    public function __construct(Event $event)
    {
        $this->model = $event;
    }

    public function all()
    {
        return $this->model->with('tickets')->get();
    }

    public function find($id)
    {
        return $this->model->with('tickets')->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $event = $this->model->findOrFail($id);
        $event->update($data);
        return $event;
    }

    public function delete($id)
    {
        $event = $this->model->findOrFail($id);
        return $event->delete();
    }
}
// This repository class implements the EventRepositoryInterface and provides methods to interact with the Event model.
// It includes methods to retrieve all events with their associated tickets, find a specific event by ID,
// create a new event, update an existing event, and delete an event by ID.
// The use of Eloquent's `with` method allows for eager loading of the tickets relationship,
// which improves performance by reducing the number of queries executed when accessing related data.