<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //client objects have method all(), where() and get() from model class
    public function reservation(){
        return $this->hasMany('App\Reservation');
    }
}
