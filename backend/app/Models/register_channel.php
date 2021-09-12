<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\detail_channel;

class register_channel extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','channel_id'];

    public function detailChannels()
    {
        return $this->hasMany(detail_channel::class);
    }
}
