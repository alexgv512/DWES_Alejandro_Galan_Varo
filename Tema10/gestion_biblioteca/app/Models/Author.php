<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\books;

class Author extends Model
{
    //
    public function books(){
        return $this->hasMany(books::class);
    }
}
