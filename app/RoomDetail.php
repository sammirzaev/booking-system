<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\RoomDetail
 *
 * @property int $id
 * @property int $adults
 * @property int|null $children
 * @property int|null $beds
 * @property int|null $footage
 * @property int $room_id
 * @property-read \App\Room $room
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomDetail whereAdults($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomDetail whereBeds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomDetail whereChildren($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomDetail whereFootage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomDetail whereRoomId($value)
 * @mixin \Eloquent
 */
class RoomDetail extends Model
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
    protected $table = 'room_details';

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
}
