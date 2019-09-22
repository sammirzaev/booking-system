<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\LocationLanguage
 *
 * @property int $id
 * @property string $lang
 * @property string $title
 * @property int $location_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LocationLanguage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LocationLanguage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LocationLanguage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LocationLanguage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LocationLanguage whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LocationLanguage whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LocationLanguage whereTitle($value)
 * @mixin \Eloquent
 * @property-read \App\Location $location
 */
class LocationLanguage extends Model
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
    protected $table = 'location_languages';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
