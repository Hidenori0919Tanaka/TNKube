<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\register_channel;

class detail_channel extends Model
{
    use HasFactory;
    protected $primaryKey = "channel_id";
    public $incrementing = false;
    protected $fillable = ['channel_id','title','description','thumbnail','published','country','customUrl','defaultLanguage'];

    public function registerChannels()
    {
        return $this->belongsTo(register_channel::class);
    }
}
