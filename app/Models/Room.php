<?php

namespace App\Models;

use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Response;

class Room extends Model
{
    use HasFactory;
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_room';
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
    public $timestamps = true;

    protected $fillable = ['number_of_people', 'number_of_rooms', 'description', 'cost_per_day', 'hotel_id_hotel'];
    public function images(): HasMany
    {
        return $this->hasMany(RoomImage::class);
    }
    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class);
    }
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'reservations', 'room_id_room', 'user_id_user');
    }
    public function existInReservation()
    {
        return Reservation::where('room_id_room', $this->id_room)->exists();
    }
}
