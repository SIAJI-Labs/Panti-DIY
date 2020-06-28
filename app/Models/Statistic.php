<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $fillable = [
        'name',
        'description',
        'value',
        'prefix',
        'suffix',
        'icon'
    ];
}
