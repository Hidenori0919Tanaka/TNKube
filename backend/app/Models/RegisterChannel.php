<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterChannel extends Model
{
    use HasFactory;
    public function detailChannels()
    {
        return $this->hasMany('App\Models\DetailChannels');
    }
}
