<?php

namespace Dev\Infrastructure\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVehicles extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
}
