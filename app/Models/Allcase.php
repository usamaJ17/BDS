<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Allcase extends Model
{
    use HasFactory;
    protected $table = 'allcase';
    protected $primaryKey = 'number';

    // public function getCreatedAtAttribute()
    // {
    //     return Carbon::parse($this->attributes['created_at'])->format('Y-m-d');
    // }
    public function getCreatedAtFormattedAttribute()
    {
        return $this->created_at->format('Y-m-d');
    }
    public function donner()
    {
        return $this->hasMany('App\Models\Donner', 'donner_id', 'donner_id');
    }
}
