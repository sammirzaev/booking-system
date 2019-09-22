<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Permission
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Permission whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Permission extends Model
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
    protected $table = 'permissions';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'permission_role');
    }
}
