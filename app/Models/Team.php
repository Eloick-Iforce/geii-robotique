<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * The Team model represents a team participating in a competition.
 */
class Team extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'user_id', 'number_of_members', 'competition_id', 'number_of_robots_but1', 'number_of_robots_but2', 'number_of_robots_but3', 'number_of_teachers', 'is_open_pdf'];

    /**
     * Get the user that owns the team.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the competition that the team belongs to.
     */
    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }

    /**
     * Get the results associated with the team.
     */
    public function results()
    {
        return $this->hasMany(Result::class);
    }
}
