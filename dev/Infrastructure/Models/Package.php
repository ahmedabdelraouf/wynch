<?php

namespace Dev\Infrastructure\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable; // 2. To add translation methods

    protected $guarded = ['id'];

    public $translatedAttributes = ['name', 'description'];

}
