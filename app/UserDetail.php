<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\UserDetail
 *
 * @property int $id
 * @property string $tel
 * @property string|null $country
 * @property string|null $region
 * @property string|null $city
 * @property string|null $address
 * @property string|null $zip
 * @property int $user_id
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserDetail whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserDetail whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserDetail whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserDetail whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserDetail whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserDetail whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserDetail whereZip($value)
 * @mixin \Eloquent
 */
class UserDetail extends Model
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
    protected $table = 'user_details';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
