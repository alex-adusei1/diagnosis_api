<?php

namespace App\Models;

class Code extends ApiModel
{
    protected $fillable = ['category_id', 'diagnosis_code', 'full_code', 'abbreviated_description', 'full_description'];

    public function setDiagnosisCodeAttribute($value)
    {
        $this->attributes['diagnosis_code'] = \ucwords($value);
    }

    public function setFullCodeAttribute($value)
    {
        $this->attributes['full_code'] = \ucwords($value);
    }

    public function setAbbreviatedDescriptionAttribute($value)
    {
        $this->attributes['abbreviated_description'] = ucfirst($value);
    }

    public function setFullDescriptionAttribute($value)
    {
        $this->attributes['full_description'] = ucfirst($value);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
