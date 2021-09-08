<?php

namespace App\Services;

use App\Repositories\API\VideoSerch\IVideoSerchAPIRepository as GetSerch;

class API_SerchService
{
    protected $getSerch;

    public function __construct(GetSerch $getSerch)
    {
        $this->getSerch = $getSerch;
    }

    /**
     * 動画 一覧取得
     * @param string $keywords
     * @return JsonResponse
     */
    public function getFindVideoByKeywords(string $keywords)
    {
        $data = $this->getSerch->getFindVideoByKeywords($keywords);
        return $data;
    }

    /**
     * 動画 一覧取得
     * @param string $channelId
     * @return JsonResponse
     */
    public function getFindVideoByChannelId(string $channelId)
    {
        $data = $this->getSerch->getFindVideoByChannelId($channelId);
        return $data;
    }

    /**
     * 動画 詳細 取得
     * @param string $videoId
     * @return JsonResponse
     */
    public function getVideoByVideoId(string $videoId)
    {
        $data = $this->getSerch->getVideoByVideoId($videoId);
        return $data;
    }

    /**
     * チャンネル一覧 取得
     * @param string $keywords
     * @return JsonResponse
     */
    public function getFindChannelByKeywords(string $keywords)
    {
        $data = $this->getSerch->getFindChannelByKeywords($keywords);
        return $data;
    }

    /**
     * チャンネル 詳細 取得
     * @param string $keywords
     * @return JsonResponse
     */
    public function getChannelByChannelId(string $channel)
    {
        $data = $this->getSerch->getChannelByChannelId($channel);
        return $data;
    }
}
