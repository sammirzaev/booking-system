<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\HotelTypeLanguages
 *
 * @property int $id
 * @property string $lang
 * @property string $title
 * @property int $hotel_type_id
 * @property-read \App\HotelType $type
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelTypeLanguages newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelTypeLanguages newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelTypeLanguages query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelTypeLanguages whereHotelTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelTypeLanguages whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelTypeLanguages whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelTypeLanguages whereTitle($value)
 * @mixin \Eloquent
 */
class HotelTypeLanguages extends Model
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
    protected $table = 'hotel_type_languages';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(HotelType::class);
    }
}
