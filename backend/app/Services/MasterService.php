<?php

namespace App\Services;

use App\Repositories\API\Serch\SerchInterfaceRepository as GetSerch;
use App\Repositories\API\Channels\ChannelsInterfaceRepository as GetChannels;
use App\Repositories\API\Videos\VideosInterfaceRepository as GetVideos;
use App\Repositories\DB\ChannelInterfaceRepository as Db_Rep;
use App\Models\Detail_channel;

class MasterService
{
    protected $getSerch;
    protected $getChannels;
    protected $getVideos;
    protected $db_rep;

    public function __construct(GetSerch $getSerch, GetChannels $getChannels, GetVideos $getVideos, Db_Rep $db_rep)
    {
        $this->getSerch = $getSerch;
        $this->getChannels = $getChannels;
        $this->getVideos = $getVideos;
        $this->db_rep = $db_rep;
    }

    /**
     * 検索キーワードで動画一覧取得（１２件）
     * @param string $keywords
     * @return object
     */
    public function channelMasterRegister(string $channelId)
    {
        $jsonData = $this->getChannels->getChannelByChannelId($channelId);
        $modelData = $this->convertChannelModel($jsonData);
        $returnObj = $this->db_rep->createDetailChannel($modelData);

        return $returnObj;
    }

    /**
     * JSONから連想配列に変換
     * @param object $jsonObj
     * @return object
     */
    public function convertChannelModel(object $jsonObj)
    {
        $model = new Detail_channel;
        $model->channel_id = $jsonObj->items[0]->id;
        $model->title = $jsonObj->items[0]->snippet->title;
        $model->description = $jsonObj->items[0]->snippet->description;
        $model->thumbnail = $jsonObj->items[0]->snippet->thumbnails->medium->url;
        $model->published = $jsonObj->items[0]->snippet->publishedAt;
        $model->country = $jsonObj->items[0]->snippet->country;
        $model->customUrl = $jsonObj->items[0]->snippet->customUrl;
        $model->defaultLanguage = $jsonObj->items[0]->snippet->defaultLanguage;

        return $model;
    }

}
