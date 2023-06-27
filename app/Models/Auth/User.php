<?php

namespace App\Models\Auth;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    protected $primaryKey = 'id_user';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'birth_date',
        'password',
        'is_hotel_owner',
        'countries_id_countries'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'countries_id_countries', 'id_countries');
    }
}
