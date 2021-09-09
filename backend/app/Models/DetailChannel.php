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
    protected $fillable = ['channel_Id','title','description','thumbnail'];

    public function registerChannels()
    {
        return $this->belongsTo(RegisterChannel::class);
    }
}
