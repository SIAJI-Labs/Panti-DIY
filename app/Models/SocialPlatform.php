<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialPlatform extends Model
{
    protected $fillable = [
        'name', 'description', 'icon'
    ];

    /**
     * Relation
     * 
     * (Primary Key)
     */
    public function socialAccount()
    {
        return $this->hasMany('App\Models\SocialAccount', 'platform_id');
    }
}
