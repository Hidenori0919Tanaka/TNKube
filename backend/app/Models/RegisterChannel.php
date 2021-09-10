<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetailChannel;
class RegisterChannel extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','channel_id'];

    public function detailChannels()
    {
        return $this->hasMany(DetailChannel::class);
    }
}
