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
        $extract = new ExtractData();
        $videos = $extract->extract_snippect($data);
        return $videos;
    }
}
