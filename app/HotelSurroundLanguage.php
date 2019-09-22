<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\HotelSurroundLanguage
 *
 * @property int $id
 * @property string $lang
 * @property string $title
 * @property string $name
 * @property int $hotel_surround_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelSurroundLanguage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelSurroundLanguage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelSurroundLanguage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelSurroundLanguage whereHotelSurroundId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelSurroundLanguage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelSurroundLanguage whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelSurroundLanguage whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelSurroundLanguage whereTitle($value)
 * @mixin \Eloquent
 * @property-read \App\HotelSurround $surround
 */
class HotelSurroundLanguage extends Model
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
    protected $table = 'hotel_surround_languages';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function surround()
    {
        return $this->belongsTo(HotelSurround::class);
    }
}
