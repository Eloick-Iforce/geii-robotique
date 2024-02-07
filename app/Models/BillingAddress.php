<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * The BillingAddress model represents a billing address associated with a user.
 */
class BillingAddress extends Model
{

    use HasFactory;

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
