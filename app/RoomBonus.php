<?php

namespace App;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;

/**
 * App\RoomBonus
 *
 * @property int $id
 * @property string|null $icon
 * @property-read \App\RoomBonusLanguage $language
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\RoomBonusLanguage[] $languages
 * @property-read int|null $languages_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Room[] $rooms
 * @property-read int|null $rooms_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomBonus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomBonus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomBonus query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomBonus whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomBonus whereId($value)
 * @mixin \Eloquent
 */
class RoomBonus extends Model
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
    protected $table = 'room_bonuses';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function languages()
    {
        return $this->hasMany(RoomBonusLanguage::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function language()
    {
        return $this->hasOne(RoomBonusLanguage::class)->where('lang', App::getLocale());
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function rooms()
    {
        return $this->belongsToMany(Room::class, 'room_bonus');
    }
}
