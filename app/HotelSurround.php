<?php

namespace App;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;

/**
 * App\HotelSurround
 *
 * @property int $id
 * @property string|null $icon
 * @property int $sort
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Hotel[] $hotels
 * @property-read int|null $hotels_count
 * @property-read \App\HotelSurroundLanguage $language
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\HotelSurroundLanguage[] $languages
 * @property-read int|null $languages_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelSurround newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelSurround newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelSurround query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelSurround whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelSurround whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelSurround whereSort($value)
 * @mixin \Eloquent
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function hotels()
    {
        return $this->belongsToMany(Hotel::class, 'hotel_surround');
    }
}
