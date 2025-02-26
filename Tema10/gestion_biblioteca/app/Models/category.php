<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\books;

class category extends Model
{
    //
    public function books(){
        return $this->belongsToMany(books::class);
    }
}
