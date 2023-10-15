<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Customer extends Model
{
    use HasFactory;

    public function courses(){
        $this->belongsToMany(Course::class);
    }
}
