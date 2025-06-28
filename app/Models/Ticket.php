<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['event_id', 'type', 'price', 'quantity'];

    /**
     * Get the event that owns the ticket.
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
// This model represents a ticket for an event, with fields for the event ID, type, price, and quantity.
// It also defines a relationship to the Event model, indicating that each ticket belongs to a specific event.