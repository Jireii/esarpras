<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class LogHistory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function log()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
