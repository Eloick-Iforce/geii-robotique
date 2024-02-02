<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    protected $fillable = ['name', 'date', 'description', 'team_id'];

    public function team()
    {
        return $this->hasMany(Team::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }
}
