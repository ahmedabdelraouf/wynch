<?php

namespace Dev\Infrastructure\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed id
 */
class Driver extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];
}
