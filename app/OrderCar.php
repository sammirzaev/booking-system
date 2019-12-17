<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\OrderCar
 *
 * @property int $id
 * @property int $price
 * @property int|null $paid
 * @property int|null $payment_type
 * @property string|null $date_start
 * @property string|null $date_end
 * @property int $adults
 * @property int|null $status
 * @property int $car_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Car $car
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCar query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCar whereAdults($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCar whereCarId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCar whereDateEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCar whereDateStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCar wherePaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCar wherePaymentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCar wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCar whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCar whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\OrderCar whereUserId($value)
 * @mixin \Eloquent
 */
class OrderCar extends Model
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
    protected $table = 'order_cars';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
