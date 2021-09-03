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
     *
     */
    public function getFindChannelByKeywords(string $keywords);

    /**
     *
     */
    public function getFindVideoByChannelId(string $channelId);

    /**
     *
     */
    public function getFindDetailChannelByChannelId(string $channelId);

    /**
     *
     */
    public function getVideoByVideoId(string $videoId);
}
