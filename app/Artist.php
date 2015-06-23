<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*Clase Artist, */
class Artist extends Model
{
   public $timestamps = false;
   protected $table = 'artist';    
   protected $fillable = ['name'];    
}
