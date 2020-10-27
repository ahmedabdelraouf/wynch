<?php

namespace Dev\Infrastructure\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleTranslation extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];
    public $timestamps = false;
}
