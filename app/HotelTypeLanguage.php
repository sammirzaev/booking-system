<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\HotelTypeLanguage
 *
 * @property int $id
 * @property string $lang
 * @property string $title
 * @property int $hotel_type_id
 * @property-read \App\HotelType $type
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelTypeLanguage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelTypeLanguage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelTypeLanguage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelTypeLanguage whereHotelTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelTypeLanguage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelTypeLanguage whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\HotelTypeLanguage whereTitle($value)
 * @mixin \Eloquent
 */
class HotelTypeLanguage extends Model
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
