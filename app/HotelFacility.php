<?php

namespace App;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;

/**
 * App\HotelFacility
 *
 * @property int $id
 * @property int|null $parent_id
 * @property string|null $icon
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelFacility newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelFacility newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelFacility query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelFacility whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelFacility whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelFacility whereParentId($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Hotel[] $hotels
 * @property-read int|null $hotels_count
 * @property-read \App\HotelFacility $language
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\HotelFacility[] $languages
 * @property-read int|null $languages_count
 */
class HotelFacility extends Model
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
    protected $table = 'hotel_facilities';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function languages()
    {
        return $this->hasMany(HotelFacility::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function language()
    {
        return $this->hasOne(HotelFacility::class)->where('lang', App::getLocale());
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function hotels()
    {
        return $this->belongsToMany(Hotel::class, 'hotel_facility');
    }
}
