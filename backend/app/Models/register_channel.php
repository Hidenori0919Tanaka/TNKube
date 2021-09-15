<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Detail_channel;

class Register_channel extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','channel_id'];

    public function detailChannels()
    {
        return $this->hasMany(detail_channel::class);
    }

    public function checkRegister(object $getChObject, object $registerObject)
    {
        $chArrya = array();
        foreach ($registerObject as $ch) {
            array_push($chArrya, $ch->channel_id);
        }

        foreach ($getChObject->items as $key => $item) {
            if(in_array($item->id->channelId, $chArrya)) {
                $item->regFlag = true;
            }
        }
        return $getChObject;
    }
}
