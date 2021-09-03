<?php

namespace App\Services;

use App\Repositories\API\VideoSerch\IVideoSerchAPIRepository as GetSerch;
use App\Models\API\ExtractData;

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
}
