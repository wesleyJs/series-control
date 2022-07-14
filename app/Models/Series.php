<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;
    protected $fillable = ['nome'];

    public function seasons()
    {
        return $this->hasMany(Season::class, 'series_id');
    }
}
