<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\CarAvailability
 *
 * @property int $id
 * @property int $date
 * @property int|null $status
 * @property int $car_id
 * @property-read \App\Car $car
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CarAvailability newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CarAvailability newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CarAvailability query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CarAvailability whereCarId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CarAvailability whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CarAvailability whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\CarAvailability whereStatus($value)
 * @mixin \Eloquent
 */
class CarAvailability extends Model
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
    protected $table = 'car_availabilities';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
