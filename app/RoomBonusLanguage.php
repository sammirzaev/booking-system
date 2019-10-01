<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\RoomBonusLanguage
 *
 * @property int $id
 * @property string $lang
 * @property string $title
 * @property int $room_bonus_id
 * @property-read \App\RoomBonus $bonus
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomBonusLanguage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomBonusLanguage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomBonusLanguage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomBonusLanguage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomBonusLanguage whereLang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomBonusLanguage whereRoomBonusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RoomBonusLanguage whereTitle($value)
 * @mixin \Eloquent
 */
class RoomBonusLanguage extends Model
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
    protected $table = 'room_bonus_languages';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bonus()
    {
        return $this->belongsTo(RoomBonus::class);
    }
}
