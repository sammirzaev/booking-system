<?php

namespace App;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;

/**
 * App\HotelBonus
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Hotel[] $hotels
 * @property-read int|null $hotels_count
 * @property-read \App\HotelBonusLanguage $language
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\HotelBonusLanguage[] $languages
 * @property-read int|null $languages_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelBonus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelBonus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelBonus query()
 * @mixin \Eloquent
 * @property int $id
 * @property string|null $icon
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelBonus whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelBonus whereId($value)
 */
class HotelBonus extends Model
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
    protected $table = 'hotel_bonuses';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function languages()
    {
        return $this->hasMany(HotelBonusLanguage::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function language()
    {
        return $this->hasOne(HotelBonusLanguage::class)->where('lang', App::getLocale());
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function hotels()
    {
        return $this->belongsToMany(Hotel::class, 'hotel_bonus');
    }
}
