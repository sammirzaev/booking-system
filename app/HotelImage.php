<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\HotelImage
 *
 * @property int $id
 * @property int $hotel_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelImage whereHotelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelImage whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Hotel $hotel
 * @property string $name
 * @property string $type
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelImage whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelImage whereType($value)
 */
class HotelImage extends Model
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
    protected $table = 'hotel_images';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
