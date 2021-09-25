<?php

namespace App\Services;

use App\Repositories\API\Serch\SerchInterfaceRepository as GetSerch;
use App\Repositories\API\Channels\ChannelsInterfaceRepository as GetChannels;
use App\Repositories\API\Videos\VideosInterfaceRepository as GetVideos;
use Illuminate\Support\Str;
use App\Models\Detail_channel;

class API_RepositoryService
{
    protected $getSerch;
    protected $getChannels;
    protected $getVideos;

    public function __construct(GetSerch $getSerch, GetChannels $getChannels, GetVideos $getVideos)
    {
        $this->getSerch = $getSerch;
        $this->getChannels = $getChannels;
        $this->getVideos = $getVideos;
    }

    /**
     * 検索キーワードで動画一覧取得（１２件）
     * @param string $keywords
     * @return object
     */
    public function getFindVideoByKeywords(string $keywords)
    {
        $jsonData = $this->getSerch->getFindVideoByKeywords($keywords);
        //チェック

        $returnObject = $this->editObject($jsonData);
        return $returnObject;
    }

    /**
     * チャンネル内の動画を検索キーワードで動画一覧取得（１２件）
     * @param string $channelId
     * @param string $keywords
     * @return object
     */
    public function getFindVideoByKeywordsAndChannelId(string $channelId, string $keywords)
    {
        $jsonData = $this->getSerch->getFindVideoByKeywordsAndChannelId($channelId, $keywords);
        //チェック

        $returnObject = $this->editObject($jsonData);
        return $returnObject;
    }

    /**
     * チャンネルidでチャンネル一覧取得(１２件)
     * @param string $channelId
     * @return object
     */
    public function getFindVideoByChannelId(string $channelId)
    {
        $jsonData = $this->getSerch->getFindVideoByChannelId($channelId);
        //チェック

        $returnObject = $this->editObject($jsonData);
        return $returnObject;
    }

    /**
     * 動画詳細取得
     * @param string $videoId
     * @return JsonResponse
     */
    public function getVideoByVideoId(string $videoId)
    {
        $jsonData = $this->getVideos->getVideoByVideoId($videoId);
        //チェック

        return $jsonData;
    }

    /**
     * 検索キーワードでチャンネル一覧取得（１２件）
     * @param string $keywords
     * @return object
     */
    public function getFindChannelByKeywords(string $keywords)
    {
        $jsonData = $this->getSerch->getFindChannelByKeywords($keywords);
        //チェック

        $returnObject = $this->editObject($jsonData);
        return $returnObject;
    }

    /**
     * チャンネル詳細取得
     * @param string $keywords
     * @return Detail_channel
     */
    public function getChannelByChannelId(string $channel)
    {
        $jsonData = $this->getChannels->getChannelByChannelId($channel);
        //チェック
        $modelData = $this->convertChannelModel($jsonData);
        return $modelData;
    }

    /**
     * 登録フラグとソートキー追加とタイトル編集
     * @param object $jsonObj
     * @return object
     */
    public function editObject(object $jsonObj)
    {
        $count = 0;
        foreach ($jsonObj->items as $key => $item) {
            //flag
            $item->regFlag = false;
            //表示文字50文字
            $item->snippet->title_50 = Str::limit($item->snippet->title, $limit = 50, $end = ' ...');
            //表示文字300文字
            $item->snippet->title_150 = Str::limit($item->snippet->title, $limit = 150, $end = ' ...');
            //dec50文字
            $item->snippet->description_50 = Str::limit($item->snippet->description, $limit = 50, $end = ' ...');
            //dec300文字
            $item->snippet->description_300 = Str::limit($item->snippet->description, $limit = 300, $end = ' ...');
            //ソート
            $item->sortKey = $count++;
        }
        return $jsonObj;
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
