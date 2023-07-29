<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sertification extends Model
{
    use HasFactory;

    public function responsibler()
    {
        return $this->belongsTo(Responsibler::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
