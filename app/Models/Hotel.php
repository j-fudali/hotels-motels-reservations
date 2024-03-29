<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hotel extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_hotel';
    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    protected $fillable = ['name', 'image', 'description', 'countries_id_countries', 'provinces_id_provinces', 'city', 'address', 'user_id_user'];
    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'countries_id_countries', 'id_countries');
    }
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'provinces_id_provinces', 'id_provinces');
    }
}
