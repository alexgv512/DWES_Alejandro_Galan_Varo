<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\books;

class loan extends Model
{
    //
    public function books(){
        return $this->belongsTo(books::class);
    }
}
