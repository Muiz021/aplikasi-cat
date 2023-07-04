<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelajaran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function soal()
    {
        return $this->hasMany(Soal::class);
    }

    public function ujian()
    {
        return $this->hasMany(Ujian::class);
    }

}
