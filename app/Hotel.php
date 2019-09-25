<?php

namespace App;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Hotel
 *
 * @property int $id
 * @property int|null $star
 * @property float $price_from
 * @property float $price_to
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hotel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hotel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hotel query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hotel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hotel wherePriceFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hotel wherePriceTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hotel whereStar($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\HotelFacility[] $facilities
 * @property-read int|null $facilities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\HotelImage[] $images
 * @property-read int|null $images_count
 * @property-read \App\HotelLanguage $language
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\HotelLanguage[] $languages
 * @property-read int|null $languages_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Location[] $locations
 * @property-read int|null $locations_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\HotelSurround[] $surrounds
 * @property-read int|null $surrounds_count
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string|null $check_in
 * @property string|null $check_out
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\HotelType[] $types
 * @property-read int|null $types_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hotel sortable($defaultParameters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hotel whereCheckIn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hotel whereCheckOut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hotel whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hotel whereLongitude($value)
 * @property int|null $status
 * @property int $sort
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hotel whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Hotel whereStatus($value)
 */
class Hotel extends Model
{
    use Sortable;

    /**
     * @var array
     */
    public $sortable = ['id',
                        'star',
                        'price_from',
                        'price_to'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * @var string
     */
    protected $table = 'hotels';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(HotelImage::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function languages()
    {
        return $this->hasMany(HotelLanguage::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function language()
    {
        return $this->hasOne(HotelLanguage::class)->where('lang', App::getLocale());
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function facilities()
    {
        return $this->belongsToMany(HotelFacility::class, 'hotel_facility');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function types()
    {
        return $this->belongsToMany(HotelType::class, 'hotel_type');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function surrounds()
    {
        return $this->belongsToMany(HotelSurround::class, 'hotel_surround');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function locations()
    {
        return $this->belongsToMany(Location::class, 'hotel_location');
    }
}
