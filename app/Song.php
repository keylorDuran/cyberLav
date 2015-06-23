<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
   public $timestamps = false;
   protected $table = 'song';    
   protected $fillable = ['name','artist_id','url_source'];


   public function artist()
   {
        return $this->hasOne('\App\Artist','id','artist_id');
   }

   

   
}
