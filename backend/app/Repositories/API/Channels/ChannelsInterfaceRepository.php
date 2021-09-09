<?php

namespace App\Repositories\API\Channels;

interface ChannelsInterfaceRepository
{
    /**
     * チャンネル 詳細 取得
     * @param string $keywords
     * @return JsonResponse
     */
    public function getChannelByChannelId(string $channelId);
}
