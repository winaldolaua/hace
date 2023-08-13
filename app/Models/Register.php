<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function sertification()
    {
        return $this->hasOne(Sertification::class);
    }
}
