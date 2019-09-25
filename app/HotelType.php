<?php

namespace App;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;

/**
 * App\HotelType
 *
 * @property int $id
 * @property string|null $icon
 * @property-read \App\HotelTypeLanguages $language
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\HotelTypeLanguages[] $languages
 * @property-read int|null $languages_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelType whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelType whereId($value)
 * @mixin \Eloquent
 * @property int $sort
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelType whereSort($value)
 */
class HotelType extends Model
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
    protected $table = 'hotel_types';

    /**
     * @var bool
     */
    public $timestamps = false;


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function languages()
    {
        return $this->hasMany(HotelTypeLanguages::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function language()
    {
        return $this->hasOne(HotelTypeLanguages::class)->where('lang', App::getLocale());
    }
}
