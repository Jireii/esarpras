<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Asset;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Space extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [
        'id'
    ];

    public function asset()
    {
        return $this->hasMany(Asset::class);
    }

    public function book()
    {
        return $this->hasMany(Book::class);
    }
}
