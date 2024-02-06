<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name', 'user_id', 'number_of_members', 'competition_id', 'number_of_robots_but1', 'number_of_robots_but2', 'number_of_robots_but3', 'number_of_teachers', 'is_open_pdf'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }
}
