<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = [];

    public function findByName($name)
    {
        return $this->where('name', $name)->first();
    }
}
