<?php

namespace App\Models;

use App\Models\Space;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;


    protected $guarded = [
        'id'
    ];

    public function space()
    {
        return $this->belongsTo(Space::class);
    }
}
