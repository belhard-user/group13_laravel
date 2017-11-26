<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    protected $fillable = ['name'];

    public function test()
    {
        return $this->belongsToMany(Test::class);
    }
}
