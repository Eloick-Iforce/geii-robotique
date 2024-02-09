<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



/**
 * @property int $id
 * @property string $name
 * @property mixed $date
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Competition extends Model
{
    protected $fillable = ['name', 'date', 'description', 'team_id'];

    public function team()
    {
        return $this->hasMany(Team::class);
    }

    public function challenge()
    {
        return $this->hasMany(Challenge::class);
    }
}
