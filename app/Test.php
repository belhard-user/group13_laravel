<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Test
 *
 * @property int $id
 * @property string $username
 * @property string $ip
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property int|null $age the age of the user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Test whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Test whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Test whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Test whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Test whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Test whereUsername($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\TestRelation[] $foo
 */
class Test extends Model
{
    protected $table = 'test';

    protected $fillable = ['username', 'ip', 'age'];

    public function foo()
    {
        return $this->hasMany(TestRelation::class);
    }

    public function specialty()
    {
        return $this->belongsToMany(Specialty::class);
    }
}
