<?php

namespace App\Repositories\DB;

use App\Models\RegisterChannel;
use App\Models\DetailChannel;
use Illuminate\Support\Facades\DB;

class ChannelRepository implements IChannelRepository
{
    /**
     * 登録チャンネル取得
     * @param int $userId
     * @return JsonResponse
     */
    public function getRegisterChannelByUserId(int $userId)
    {
        $registerChs = RegisterChannel::find($userId);
        return $registerChs;
    }
    /**
     * チャンネル詳細取得
     * @param string $channelId
     * @return videoId
     */
    public function getDetailChannelByChannelId(string $channelId)
    {
        $registerChs = DetailChannel::find($channelId)->first();
        return $registerChs;
    }
    /**
     * チャンネル詳細登録
     * @param DetailChannel $model
     * @return JsonResponse
     */
    public function insertDetailChannel(DetailChannel $model)
    {
        DB::transaction(function() use($model) {
            $model->save();
            throw new \Exception('ここで処理を終わらせる');

        });
    }
    /**
     * ユーザーチャンネル登録
     * @param RegisterChannel $model
     * @return videoId
     */
    public function insertRegisterChannel(RegisterChannel $model)
    {
        DB::transaction(function() use($model) {
            $model->save();
            throw new \Exception('ここで処理を終わらせる');
        });
    }

    /**
     * ユーザーチャンネル削除
     * @param int $userId
     * @return videoId
     */
    public function deleteRegisterChannelByUserId(int $id)
    {
        $model = RegisterChannel::find($id);
        DB::transaction(function() use($model) {
            $model->delete();
            throw new \Exception('ここで処理を終わらせる');

        });
    }
}
