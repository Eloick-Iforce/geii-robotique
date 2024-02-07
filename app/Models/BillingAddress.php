<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $zip_code
 * @property string $country
 * @property string $etablisement
 * @property string $name
 * @property string $lastname
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class BillingAddress extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'address', 'city', 'state', 'zip_code', 'country', 'etablisement', 'name', 'lastname'];

    /**
     * Get the user that owns the billing address.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
