<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{

    use HasFactory;
    protected $fillable = ['title', 'description', 'start_date', 'end_date'];

    /**
     * Get the tickets associated with the event.
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
