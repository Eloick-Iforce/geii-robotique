<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    protected $fillable = ['name'];

    public function challengeRegistrations()
    {
        return $this->hasMany(ChallengeRegistration::class);
    }
}
