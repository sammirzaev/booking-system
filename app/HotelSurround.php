<?php

namespace App;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;

/**
 * App\HotelSurround
 *
 * @property int $id
 * @property float|null $distance
 * @property int $hotel_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelSurround newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelSurround newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelSurround query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelSurround whereDistance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelSurround whereHotelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelSurround whereId($value)
 * @mixin \Eloquent
 * @property-read \App\HotelSurroundLanguage $language
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\HotelSurroundLanguage[] $languages
 * @property-read int|null $languages_count
 */
class HotelSurround extends Model
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
    protected $table = 'hotel_surrounds';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function languages()
    {
        return $this->hasMany(HotelSurroundLanguage::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function language()
    {
        return $this->hasOne(HotelSurroundLanguage::class)->where('lang', App::getLocale());
    }
}
