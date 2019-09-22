<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\HotelFacilityLanguage
 *
 * @property int $id
 * @property string $lang
 * @property string $title
 * @property int $hotel_facility_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelFacilityLanguage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelFacilityLanguage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelFacilityLanguage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelFacilityLanguage whereHotelFacilityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelFacilityLanguage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelFacilityLanguage whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelFacilityLanguage whereTitle($value)
 * @mixin \Eloquent
 * @property-read \App\HotelFacility $facility
 */
class HotelFacilityLanguage extends Model
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
    protected $table = 'hotel_facility_languages';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function facility()
    {
        return $this->belongsTo(HotelFacility::class);
    }
}
