<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Author;
use App\Models\loan;
use App\Models\category;


class books extends Model
{
    //
    public function author(){
        return $this->belongsTo(Author::class);
        
    }
    public function loans(){
        return $this->hasMany(loan::class);
    }

    public function categories(){
        return $this->belongsToMany(category::class);
    }
}
