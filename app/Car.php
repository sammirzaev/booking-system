<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

/**
 * App\Car
 *
 * @property int $id
 * @property string $name
 * @property int $type
 * @property float $price
 * @property int|null $status
 * @property int $sort
 * @property int $adult_min
 * @property int $adult_max
 * @property int $bags
 * @property int $doors
 * @property int $condition
 * @property string $img
 * @property string|null $latitude
 * @property string|null $longitude
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\CarAvailability[] $availabilities
 * @property-read int|null $availabilities_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Car active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Car newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Car newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Car query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Car sortable($defaultParameters = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Car whereAdultMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Car whereAdultMin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Car whereBags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Car whereCondition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Car whereDoors($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Car whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Car whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Car whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Car whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Car whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Car wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Car whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Car whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Car whereType($value)
 * @mixin \Eloquent
 */
class Car extends Model
{
    const STATUS_ACTIVE = 0;

    use Sortable;

    /**
     * @var array
     */
    public $sortable = ['type', 'price'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * @var string
     */
    protected $table = 'cars';

    /**
     * @var bool
     */
    public $timestamps = false;


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function availabilities()
    {
        return $this->hasMany(CarAvailability::class);
    }

    /**
     * Scope a query to only include active cars.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('status',  self::STATUS_ACTIVE);
    }
}
