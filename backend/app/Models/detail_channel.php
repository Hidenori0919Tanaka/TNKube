<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Register_channel;
use Illuminate\Support\Str;

class Detail_channel extends Model
{
    use HasFactory;
    protected $primaryKey = "channel_id";
    public $incrementing = false;
    protected $fillable = ['channel_id','title','description','thumbnail','published','country','customUrl','defaultLanguage'];
    public $title_50;
    public $description_50;

    public function registerChannels()
    {
        return $this->belongsTo(register_channel::class);
    }

    public function addViewColumn(object $detailObject)
    {
        foreach($detailObject as $model)
        {
            $model->title_50 = Str::limit($model->title, $limit = 50, $end = ' ...');
            $model->description_50 = Str::limit($model->description, $limit = 50, $end = ' ...');
        }
        return $detailObject;
    }
}
