<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\RoomAvailability
 *
 * @property-read \App\Hotel $hotel
 * @property-read \App\Room $room
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomAvailability newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomAvailability newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomAvailability query()
 * @mixin \Eloquent
 */
class RoomAvailability extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * @var string
     */
    protected $table = 'room_availabilities';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    /**
     * Get the room availability current date.
     *
     * @param  string  $value
     * @return string
     */
    public function getCurrentDateAttribute($value)
    {
        return date('Y-m-d', $value);
    }
}

