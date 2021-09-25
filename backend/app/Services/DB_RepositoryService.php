<?php

namespace App\Services;

use App\Repositories\DB\ChannelInterfaceRepository as DB_rep;
use App\Models\Register_channel;
use App\Models\Detail_channel;

class DB_RepositoryService
{
    protected $db_rep;

    public function __construct(DB_rep $db_rep)
    {
        $this->db_rep = $db_rep;
    }

    /**
     * 登録チャンネル取得
     * @param int $userId
     * @return JsonResponse
     */
    public function getRegisterChannelByUserId(int $userId)
    {
        $data = $this->db_rep->getRegisterChannelByUserId($userId);
        //チェック

        return $data;
    }

    /**
     * 登録チャンネル取得
     * @param int $userId
     * @return JsonResponse
     */
    public function getRegisterChannelByUserIdAndDetail(int $userId, string $detailChannelId)
    {
        $data = $this->db_rep->getRegisterChannelByUserIdAndDetail($userId, $detailChannelId);
        //チェック
        return $data;
    }

    /**
     * チャンネル詳細取得
     * @param string $channelId
     * @return videoId
     */
    public function getDetailChannelByChannelId(string $channelId)
    {
        $data = $this->db_rep->getDetailChannelByChannelId($channelId);
        //チェック
        return $data;
    }

    /**
     * チャンネル詳細取得
     * @param string $channelId
     * @return videoId
     */
    public function getDetailChannelExitByChannelId(string $channelId)
    {
        $data = $this->db_rep->getDetailChannelExitByChannelId($channelId);
        //チェック
        return $data;
    }

    /**
     * チャンネル詳細取得
     * @param string $channelId
     * @return videoId
     */
    public function firstCreateDetailChannelByChannelId(Detail_channel $model)
    {
        $data = $this->db_rep->firstCreateDetailChannelByChannelId($model);
        //チェック
        return $data;
    }

    /**
     * チャンネル詳細登録
     * @param DetailChannel $model
     * @return JsonResponse
     */
    public function createDetailChannel(Detail_channel $model)
    {
        $data = $this->db_rep->createDetailChannel($model);
        //チェック
        return $data;
    }

    /**
     * チャンネル詳細取得
     * @param string $channelId
     * @return videoId
     */
    public function firstCreateRegisterChannel($channelId, $userId)
    {
        $data = $this->db_rep->firstCreateRegisterChannel($channelId, $userId);
        //チェック
        return $data;
    }


    /**
     * ユーザーチャンネル登録
     * @param RegisterChannel $model
     * @return videoId
     */
    public function createRegisterChannel($channelId, $userId)
    {
        $data = $this->db_rep->createRegisterChannel($channelId, $userId);
        //チェック
        return $data;
    }

    /**
     * ユーザーチャンネル削除
     * @param int $userId
     * @return videoId
     */
    public function deleteRegisterChannelByUserId(int $userId, string $channelId)
    {
        $data = $this->db_rep->deleteRegisterChannelByUserId($userId, $channelId);
        //チェック
        return $data;
    }

    /**
     * チャンネル詳細登録チェック
     * @param string $channelId
     * @return bool
     */
    public function existDetailChannelByChannelId(string $channelId)
    {
        //チェック
        return $this->db_rep->existDetailChannelByChannelId($channelId);
    }
}
