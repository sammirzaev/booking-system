<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\RoomImage
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property int $room_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Room $room
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomImage whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomImage whereRoomId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomImage whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomImage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class RoomImage extends Model
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
    protected $table = 'room_images';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
