<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\RoomLanguage
 *
 * @property int $id
 * @property string $lang
 * @property string $description
 * @property int $room_id
 * @property-read \App\Room $room
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomLanguage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomLanguage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomLanguage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomLanguage whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomLanguage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomLanguage whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomLanguage whereRoomId($value)
 * @mixin \Eloquent
 */
class RoomLanguage extends Model
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
    protected $table = 'room_languages';

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
