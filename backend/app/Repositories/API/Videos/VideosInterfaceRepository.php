<?php

namespace App\Repositories\API\Videos;

interface VideosInterfaceRepository
{
    /**
     * 動画 詳細 取得
     * @param string $videoId
     * @return JsonResponse
     */
    public function getVideoByVideoId(string $videoId);
}
