<?php

namespace App\Services;

use App\Repositories\API\Serch\SerchInterfaceRepository as GetSerch;
use App\Repositories\API\Channels\ChannelsInterfaceRepository as GetChannels;
use App\Repositories\API\Videos\VideosInterfaceRepository as GetVideos;

class API_SerchService
{
    protected $getSerch;
    protected $getChannels;
    protected $getVideos;

    public function __construct(GetSerch $getSerch,GetChannels $getChannels,GetVideos $getVideos)
    {
        $this->getSerch = $getSerch;
        $this->getChannels = $getChannels;
        $this->getVideos = $getVideos;
    }

    /**
     * 検索キーワードで動画一覧取得（１２件）
     * @param string $keywords
     * @return JsonResponse
     */
    public function getFindVideoByKeywords(string $keywords)
    {
        $data = $this->getSerch->getFindVideoByKeywords($keywords);
        return $data;
    }

    /**
     * チャンネル内の動画を検索キーワードで動画一覧取得（１２件）
     * @param string $channelId
     * @param string $keywords
     * @return JsonResponse
     */
    public function getFindVideoByKeywordsAndChannelId(string $channelId ,string $keywords)
    {
        $data = $this->getSerch->getFindVideoByKeywordsAndChannelId($channelId ,$keywords);
        return $data;
    }

    /**
     * チャンネルidでチャンネル一覧取得(１２件)
     * @param string $channelId
     * @return JsonResponse
     */
    public function getFindVideoByChannelId(string $channelId)
    {
        $data = $this->getSerch->getFindVideoByChannelId($channelId);
        return $data;
    }

    /**
     * 動画詳細取得
     * @param string $videoId
     * @return JsonResponse
     */
    public function getVideoByVideoId(string $videoId)
    {
        $data = $this->getVideos->getVideoByVideoId($videoId);
        return $data;
    }

    /**
     * 検索キーワードでチャンネル一覧取得（１２件）
     * @param string $keywords
     * @return JsonResponse
     */
    public function getFindChannelByKeywords(string $keywords)
    {
        $data = $this->getSerch->getFindChannelByKeywords($keywords);
        return $data;
    }

    /**
     * チャンネル詳細取得
     * @param string $keywords
     * @return JsonResponse
     */
    public function getChannelByChannelId(string $channel)
    {
        $data = $this->getChannels->getChannelByChannelId($channel);
        return $data;
    }
}
