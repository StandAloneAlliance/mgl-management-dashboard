<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\User;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'surname', 'cfr', 'email', 'cover_image', 'date_of_birth', 'city_of_birth', 'task'];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_customer');
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

}
