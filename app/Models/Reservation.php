<?php

namespace App\Models;

use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_reservation';
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
    public $timestamps = ["created_at"];
    const CREATED_AT = 'reserved_at';
    const UPDATED_AT = null;
    protected $fillable = ['starting_date', 'ending_date', 'user_id_user', 'room_id_room'];
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class, 'room_id_room', 'id_room');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id_user', 'id_user');
    }
}
