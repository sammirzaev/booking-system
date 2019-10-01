<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\RoomTypeLanguage
 *
 * @property int $id
 * @property string $lang
 * @property string $title
 * @property int $room_type_id
 * @property-read \App\RoomType $type
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomTypeLanguage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomTypeLanguage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomTypeLanguage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomTypeLanguage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomTypeLanguage whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomTypeLanguage whereRoomTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomTypeLanguage whereTitle($value)
 * @mixin \Eloquent
 */
class RoomTypeLanguage extends Model
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
    protected $table = 'room_type_languages';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(RoomType::class);
    }
}
