<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RegisterChannel;

class DetailChannel extends Model
{
    use HasFactory;
    protected $primaryKey = "channel_Id";
    public $incrementing = false;

    public function registerChannels()
    {
        return $this->belongsTo(RegisterChannel::class);
    }
}
