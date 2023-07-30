<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sertification extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function responsibler()
    {
        return $this->belongsTo(Responsibler::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    public function document()
    {
        return $this->hasMany(Document::class);
    }
}
