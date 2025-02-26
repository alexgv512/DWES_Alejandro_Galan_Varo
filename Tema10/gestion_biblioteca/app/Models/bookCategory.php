<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\books;
use App\Models\category;

class bookCategory extends Model
{
    //
    public function books(){
        return $this->belongsToMany(books::class);
    }

    public function categories(){
        return $this->belongsToMany(category::class);
    }
}
