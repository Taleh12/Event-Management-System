<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use HasFactory;
    protected $fillable = ['name', 'read_count'];
    /**
     * Increment the read count for the product.
     *
     * @return void
     */

    //
}
