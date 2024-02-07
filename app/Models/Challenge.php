<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * The Challenge model represents a challenge in the application.
 *
 * It extends the Eloquent Model class and provides methods for interacting with the challenges table in the database.
 */
class Challenge extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'competition_id', 'description', 'points'];
}
