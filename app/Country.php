<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    public function trips()
    {
        return $this->hasMany('App\Trip');
    
    }
}
