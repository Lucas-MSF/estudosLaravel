<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class Serie extends Model
{
    public $timestamps=false;
    protected $fillable=['nome','capa'];

    public function temporadas()
    {
        return $this->hasMany(Temporada::class);
    }
    public function getCapaUrlAttribute()
    {
        if($this->capa)
        {
            return Storage::url($this->capa);
        }
        return Storage::url('serie/sem-foto.jpg');
    }
}