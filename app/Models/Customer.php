<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'surname', 'cfr', 'email', 'cover_image', 'date_of_birth', 'city_of_birth', 'task'];

    public function courses(){
        $this->belongsToMany(Course::class);
    }
}
