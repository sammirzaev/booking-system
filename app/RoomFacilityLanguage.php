<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\RoomFacilityLanguage
 *
 * @property int $id
 * @property string $lang
 * @property string $title
 * @property int $room_facility_id
 * @property-read \App\RoomFacility $facility
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomFacilityLanguage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomFacilityLanguage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomFacilityLanguage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomFacilityLanguage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomFacilityLanguage whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomFacilityLanguage whereRoomFacilityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomFacilityLanguage whereTitle($value)
 * @mixin \Eloquent
 */
class RoomFacilityLanguage extends Model
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
    protected $table = 'room_facility_languages';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function facility()
    {
        return $this->belongsTo(RoomFacility::class);
    }
}
