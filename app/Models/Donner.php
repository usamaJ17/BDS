<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donner extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='donner';
    protected $primaryKey='donner_id';

    public function getEmailAttribute($value)
    {
      if(is_null($value)){
          return "N/A";
      }
      else{
          return $value;
      }
    }
    public function getLocationAttribute($value)
    {
      if(is_null($value)){
          return "N/A";
      }
      else{
          return $value;
      }
    }
    public function getHistoryAttribute($value)
    {
      if(is_null($value)){
          return "N/A";
      }
      else{
          return $value;
      }
    }
    public function getDateAttribute($value)
    {
      if(is_null($value)){
          return "N/A";
      }
      else{
          return $value;
      }
    }
    public function getTeamAttribute($value)
    {
      if(is_null($value)){
          return "N/A";
      }
      else{
          return $value;
      }
    }
}
