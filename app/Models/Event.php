<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title', 'description', 'start_date', 'end_date'];

    /**
     * Get the tickets associated with the event.
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
