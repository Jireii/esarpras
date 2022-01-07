<?php

namespace App\Models;

use App\Models\Space;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Asset extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [
        'id'
    ];

    protected $fillabel = [
        'nama',
        'gambar',
        'merk',
        'tipe',
        'register',
        'harga',
        'tahun_beli',
        'dana',
        'kondisi',
        'space_id',
    ];

    public function Space()
    {
        return $this->belongsTo(Space::class);
    }
}
