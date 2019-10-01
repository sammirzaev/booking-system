<?php

namespace App;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;

/**
 * App\RoomFacility
 *
 * @property int $id
 * @property int|null $parent_id
 * @property string|null $icon
 * @property int $sort
 * @property-read \App\RoomFacilityLanguage $language
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\RoomFacilityLanguage[] $languages
 * @property-read int|null $languages_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Room[] $rooms
 * @property-read int|null $rooms_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomFacility newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomFacility newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomFacility query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomFacility whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomFacility whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomFacility whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomFacility whereSort($value)
 * @mixin \Eloquent
 */
class RoomFacility extends Model
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
    protected $table = 'room_facilities';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function languages()
    {
        return $this->hasMany(RoomFacilityLanguage::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function language()
    {
        return $this->hasOne(RoomFacilityLanguage::class)->where('lang', App::getLocale());
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function rooms()
    {
        return $this->belongsToMany(Room::class, 'room_facility');
    }
}
