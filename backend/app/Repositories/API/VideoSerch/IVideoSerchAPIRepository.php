<?php

namespace App\Repositories\API\VideoSerch;

interface IVideoSerchAPIRepository
{
    /**
     * keywordsで12件までの動画を取得
     *
     * @var string $keywords
     * @return object
     */
    public function getFindVideoByKeywords(string $keywords);

    /**
     * チャンネル一覧 取得
     * @param string $keywords
     * @return JsonResponse
     */
    public function getFindChannelByKeywords(string $keywords);

    /**
     * 動画 一覧取得
     * @param string $channelId
     * @return JsonResponse
     */
    public function getFindVideoByChannelId(string $channelId);

    /**
     * チャンネル 詳細 取得
     * @param string $keywords
     * @return JsonResponse
     */
    public function getChannelByChannelId(string $channelId);

    /**
     * 動画 詳細 取得
     * @param string $videoId
     * @return JsonResponse
     */
    public function getVideoByVideoId(string $videoId);
}
