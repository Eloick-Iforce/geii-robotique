<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Result
 *
 * @package App\Models
 *
 * @property int $id
 * @property int $competition_id
 * @property int $team_id
 * @property string $result_data
 * @property string $media_url
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 *
 * @property Competition $competition
 * @property Team $team
 */
class Result extends Model
{
    use HasFactory;

    protected $fillable = ['competition_id', 'team_id', 'result_data', 'media_url'];

    /**
     * Get the competition that the result belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }

    /**
     * Get the team that the result belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
