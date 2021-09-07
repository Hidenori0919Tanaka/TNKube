<?php

namespace App\Services;

use App\Repositories\DB\IChannelRepository as Get_ch;
use App\Models\RegisterChannel;
use App\Models\DetailChannels;

class DB_RepositoryService
{
    protected $get_ch;

    public function __construct(Get_ch $get_ch)
    {
        $this->get_ch = $get_ch;
    }

    /**
     * 登録チャンネル取得
     * @param int $userId
     * @return JsonResponse
     */
    public function getRegisterChannelByUserId(int $userId)
    {
        $data = $this->get_ch->getRegisterChannelByUserId($userId);
        return $data;
    }

    /**
     * 登録チャンネル取得
     * @param int $userId
     * @return JsonResponse
     */
    public function getRegisterChannelByUserIdAndDetail(int $userId, int $detailChannelId)
    {
        $data = $this->get_ch->getRegisterChannelByUserIdAndDetail($userId, $detailChannelId);
        return $data;
    }

    /**
     * チャンネル詳細取得
     * @param string $channelId
     * @return videoId
     */
    public function getDetailChannelByChannelId(string $channelId)
    {
        $data = $this->get_ch->getDetailChannelByChannelId($channelId);
        return $data;
    }

    /**
     * チャンネル詳細取得
     * @param string $channelId
     * @return videoId
     */
    public function getDetailChannelExitByChannelId(string $channelId)
    {
        $data = $this->get_ch->getDetailChannelExitByChannelId($channelId);
        return $data;
    }

    /**
     * チャンネル詳細登録
     * @param DetailChannel $model
     * @return JsonResponse
     */
    public function insertDetailChannel(DetailChannels $model)
    {
        $data = $this->get_ch->insertDetailChannel($model);
        return $data;
    }

    /**
     * ユーザーチャンネル登録
     * @param RegisterChannel $model
     * @return videoId
     */
    public function insertRegisterChannel(RegisterChannel $model)
    {
        $data = $this->get_ch->insertRegisterChannel($model);
        return $data;
    }

    /**
     * ユーザーチャンネル削除
     * @param int $userId
     * @return videoId
     */
    public function deleteRegisterChannelByUserId(int $id)
    {
        $data = $this->get_ch->deleteRegisterChannelByUserId($id);
        return $data;
    }
}
