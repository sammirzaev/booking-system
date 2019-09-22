<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\HotelLanguage
 *
 * @property int $id
 * @property string $lang
 * @property string $title
 * @property string $address
 * @property float|null $latitude
 * @property float|null $longitude
 * @property string $description
 * @property int $hotel_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelLanguage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelLanguage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelLanguage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelLanguage whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelLanguage whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelLanguage whereHotelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelLanguage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelLanguage whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelLanguage whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelLanguage whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelLanguage whereTitle($value)
 * @mixin \Eloquent
 * @property-read \App\Hotel $hotel
 */
class HotelLanguage extends Model
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
    protected $table = 'hotel_languages';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
