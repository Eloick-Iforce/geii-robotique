<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Competition
 * 
 * @package App\Models
 * 
 * @property int $id
 * @property string $name
 * @property string $date
 * @property string $description
 * @property int $team_id
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Team[] $team
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\Result[] $results
 */


class Competition extends Model
{
    protected $fillable = ['name', 'date', 'description', 'team_id'];

    public function team()
    {
        return $this->hasMany(Team::class);
    }


    public function results()
    {
        return $this->hasMany(Result::class);
    }
}
