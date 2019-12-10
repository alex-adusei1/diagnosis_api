<?php

namespace App\Models;

class Category extends ApiModel
{
    protected $fillable = ['code', 'title'];

    public function setCodeAttribute($value)
    {
        $this->attributes['code'] = \ucwords($value);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = ucfirst($value);
    }
}
