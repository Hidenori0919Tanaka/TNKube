<?php

namespace App\Services;

use App\Repositories\DB\IChannelRepository as Get_ch;
use App\Models\register_channel;
use App\Models\detail_channel;

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
    public function getRegisterChannelByUserIdAndDetail(int $userId, string $detailChannelId)
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
     * チャンネル詳細取得
     * @param string $channelId
     * @return videoId
     */
    public function firstCreateDetailChannelByChannelId(detail_channel $model)
    {
        $data = $this->get_ch->firstCreateDetailChannelByChannelId($model);
        return $data;
    }

    /**
     * チャンネル詳細登録
     * @param DetailChannel $model
     * @return JsonResponse
     */
    public function insertDetailChannel(detail_channel $model)
    {
        $data = $this->get_ch->insertDetailChannel($model);
        return $data;
    }

    /**
     * チャンネル詳細取得
     * @param string $channelId
     * @return videoId
     */
    public function firstCreateRegisterChannel(register_channel $model)
    {
        $data = $this->get_ch->firstCreateRegisterChannel($model);
        return $data;
    }


    /**
     * ユーザーチャンネル登録
     * @param RegisterChannel $model
     * @return videoId
     */
    public function insertRegisterChannel(register_channel $model)
    {
        $data = $this->get_ch->insertRegisterChannel($model);
        return $data;
    }

    /**
     * ユーザーチャンネル削除
     * @param int $userId
     * @return videoId
     */
    public function deleteRegisterChannelByUserId(int $userId, string $channelId)
    {
        $data = $this->get_ch->deleteRegisterChannelByUserId($userId, $channelId);
        return $data;
    }
}
