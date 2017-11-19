<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\TestRelation
 *
 * @property int $id
 * @property int $test_id
 * @property string|null $address
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestRelation whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestRelation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestRelation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestRelation whereTestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TestRelation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TestRelation extends Model
{
    protected $fillable = ['address'];

    // bar_id
    public function test()
    {
        return $this->belongsTo(Test::class);
    }
}
