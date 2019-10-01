<?php

namespace App;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;

/**
 * App\RoomType
 *
 * @property int $id
 * @property string|null $icon
 * @property int $sort
 * @property-read \App\RoomTypeLanguage $language
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\RoomTypeLanguage[] $languages
 * @property-read int|null $languages_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomType whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomType whereSort($value)
 * @mixin \Eloquent
 */
class RoomType extends Model
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
    protected $table = 'room_types';

    /**
     * @var bool
     */
    public $timestamps = false;


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function languages()
    {
        return $this->hasMany(RoomTypeLanguage::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function language()
    {
        return $this->hasOne(RoomTypeLanguage::class)->where('lang', App::getLocale());
    }
}
