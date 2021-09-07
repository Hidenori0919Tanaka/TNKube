<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailChannels extends Model
{
    use HasFactory;
    public function registerChannel()
    {
        return $this->belongsTo('App\Models\RegisterChannel');
    }
}
