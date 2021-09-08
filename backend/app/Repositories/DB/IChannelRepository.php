<?php

namespace App\Repositories\DB;

use App\Models\RegisterChannel;
use App\Models\DetailChannel;

interface IChannelRepository
{
    /**
     * 登録チャンネル取得
     * @param int $userId
     * @return JsonResponse
     */
    public function getRegisterChannelByUserId(int $userId);
    /**
     * 登録チャンネル取得
     * @param int $userId
     * @return JsonResponse
     */
    public function getRegisterChannelByUserIdAndDetail(int $userId, string $detailChannelId);
    /**
     * チャンネル詳細取得
     * @param string $channelId
     * @return videoId
     */
    public function getDetailChannelByChannelId(string $channelId);
    /**
     * チャンネル詳細検索取得
     * @param string $channelId
     * @return videoId
     */
    public function getDetailChannelExitByChannelId(string $channelId);
    /**
     * チャンネル詳細登録
     * @param DetailChannel $model
     * @return JsonResponse
     */
    public function insertDetailChannel(DetailChannel $model);
    /**
     * ユーザーチャンネル登録
     * @param RegisterChannel $model
     * @return videoId
     */
    public function insertRegisterChannel(RegisterChannel $model);

    /**
     * ユーザーチャンネル削除
     * @param int $userId
     * @return videoId
     */
    public function deleteRegisterChannelByUserId(int $userId ,string $channelId);
}
