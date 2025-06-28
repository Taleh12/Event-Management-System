<?php

namespace App\Repositories;

interface EventRepositoryInterface
{
    public function all();

    public function find($id);

    public function create(array $data);

    public function update($id, array $data);

    public function delete($id);
}
// This interface defines the methods for an Event repository, allowing for CRUD operations on events.
// It includes methods to retrieve all events, find a specific event by ID, create a new event, update an existing event, and delete an event by ID.
// This structure allows for a clean separation of concerns, making it easier to manage event data and implement different storage mechanisms if needed in the future.
// The interface can be implemented by a class that interacts with the database or any other data source, ensuring that the application can work with events in a consistent manner.