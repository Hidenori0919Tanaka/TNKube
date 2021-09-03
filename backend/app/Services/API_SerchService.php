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
     * 動画 取得
     * @param string $keywords
     * @return videoId
     */
    public function getVideoByVideoId(string $videoId)
    {
        $data = $this->getSerch->getVideoByVideoId($videoId);
        return $data;
    }

    /**
     * チャンネル一覧 取得
     * @param string $keywords
     * @return videoId
     */
    public function getFindChannelByKeywords(string $keywords)
    {
        $data = $this->getSerch->getFindChannelByKeywords($keywords);
        return $data;
    }

    /**
     * チャンネル 取得
     * @param string $keywords
     * @return videoId
     */
    public function getChannelByChannelId(string $channel)
    {
        $data = $this->getSerch->getFindDetailChannelByChannelId($channel);
        return $data;
    }
}
