<?php

namespace App\Repositories\API\Serch;

interface SerchInterfaceRepository
{
    /**
     * keywordsで12件までの動画取得
     *
     * @var string $keywords
     * @return object
     */
    public function getFindVideoByKeywords(string $keywords);

    /**
     *keywordsで12件までのチャンネル動画取得
     *
     * @var string $channelId
     * @var string $keywords
     * @return object
     */
    public function getFindVideoByKeywordsAndChannelId(string $channelId ,string $keywords);

    /**
     * keywordsで12件までのチャンネル一覧取得
     * @param string $keywords
     * @return JsonResponse
     */
    public function getFindChannelByKeywords(string $keywords);

    /**
     * channelIdで12件までの動画一覧取得
     * @param string $channelId
     * @return JsonResponse
     */
    public function getFindVideoByChannelId(string $channelId);
}
