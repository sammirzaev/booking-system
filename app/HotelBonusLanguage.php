<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\HotelBonusLanguage
 *
 * @property-read \App\HotelBonus $bonus
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelBonusLanguage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelBonusLanguage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelBonusLanguage query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $lang
 * @property string $title
 * @property int $hotel_bonus_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelBonusLanguage whereHotelBonusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelBonusLanguage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelBonusLanguage whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelBonusLanguage whereTitle($value)
 */
class HotelBonusLanguage extends Model
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
    protected $table = 'hotel_bonus_languages';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bonus()
    {
        return $this->belongsTo(HotelBonus::class);
    }
}
