<?php

namespace Dev\Infrastructure\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model implements TranslatableContract
{
    use HasFactory;
    use \Astrotomic\Translatable\Translatable; // 2. To add translation methods

    protected $guarded = ['id'];

    public $translatedAttributes = ['name', 'description'];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

}
