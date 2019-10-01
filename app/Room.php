<?php

namespace App;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Room
 *
 * @property int $id
 * @property float|null $price
 * @property int|null $booking_option
 * @property int|null $payment_type
 * @property float|null $booking_value
 * @property float|null $cancel_booking_value
 * @property float|null $discount_value
 * @property int $sort
 * @property string|null $notes
 * @property int $hotel_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\RoomAvailability[] $availabilities
 * @property-read int|null $availabilities_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\RoomBonus[] $bonuses
 * @property-read int|null $bonuses_count
 * @property-read \App\RoomDetail $detail
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\RoomFacility[] $facilities
 * @property-read int|null $facilities_count
 * @property-read \App\RoomImage $image
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\RoomImage[] $images
 * @property-read int|null $images_count
 * @property-read \App\RoomLanguage $language
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\RoomLanguage[] $languages
 * @property-read int|null $languages_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\RoomType[] $types
 * @property-read int|null $types_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Room newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Room newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Room query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Room whereBookingOption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Room whereBookingValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Room whereCancelBookingValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Room whereDiscountValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Room whereHotelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Room whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Room whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Room wherePaymentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Room wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Room whereSort($value)
 * @mixin \Eloquent
 */
class Room extends Model
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
    protected $table = 'rooms';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function languages()
    {
        return $this->hasMany(RoomLanguage::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function language()
    {
        return $this->hasOne(RoomLanguage::class)->where('lang', App::getLocale());
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function image()
    {
        return $this->hasOne(RoomImage::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(RoomImage::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function facilities()
    {
        return $this->belongsToMany(RoomFacility::class, 'room_facility');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function type()
    {
        return $this->belongsToMany(RoomType::class, 'room_type');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function bonuses()
    {
        return $this->belongsToMany(RoomBonus::class, 'room_bonus');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function availabilities()
    {
        return $this->hasMany(RoomAvailability::class)->orderBy('current_date');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function hotelAvailabilities()
    {
        return $this->belongsToMany(Hotel::class, 'room_availabilities');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function detail()
    {
        return $this->hasOne(RoomDetail::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
