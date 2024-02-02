<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingAddress extends Model
{

    use HasFactory;

    protected $fillable = ['user_id', 'address', 'city', 'state', 'zip_code', 'country', 'etablisement', 'name', 'lastname'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
