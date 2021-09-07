<?php

namespace App\Repositories\DB;

use App\Models\RegisterChannel;
use App\Models\DetailChannel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ChannelRepository implements IChannelRepository
{
    /**
     * 登録チャンネル取得
     * @param int $userId
     * @return JsonResponse
     */
    public function getRegisterChannelByUserId(int $userId)
    {
        try {
            // $registerChs = RegisterChannel::where('user_id',$userId)->detailChannels->get();
            // $registerChs = RegisterChannel::where('user_id',$userId)->with('detailChannels');
            $registerChs = RegisterChannel::with('detailChannels')->where('user_id',$userId)->get();
            return $registerChs;
        } catch (\Exception $e) {
            Log::error($e);
            throw $e;
        }
    }

    /**
     * 登録チャンネル取得
     * @param int $userId
     * @return JsonResponse
     */
    public function getRegisterChannelByUserIdAndDetail(int $userId, int $detailChannelId)
    {
        try {
            $registerChs = RegisterChannel::where('user_id' ,$userId)->where('detail_channel_id', $detailChannelId)->first();
            return $registerChs;
        } catch (\Exception $e) {
            Log::error($e);
            throw $e;
        }
    }


    /**
     * チャンネル詳細取得
     * @param string $channelId
     * @return videoId
     */
    public function getDetailChannelByChannelId(string $channelId)
    {
        try {
            $registerChs = DetailChannel::find($channelId);
            return $registerChs;
        } catch (ModelNotFoundException $e) {
            throw $e;
        } catch (\Throwable $e) {
            // それ以外のエラーは想定外なのでログに残す
            Log::error($e);
            throw $e;
        }
    }
    /**
     * チャンネル詳細取得
     * @param string $channelId
     * @return videoId
     */
    public function getDetailChannelExitByChannelId(string $channelId)
    {
        $registerChs = DetailChannel::where('channelId', $channelId)->first();
        return $registerChs;
        try {
            $registerChs = DetailChannel::where('channelId', $channelId)->count();
            return $registerChs;
        } catch (ModelNotFoundException $e) {
            throw $e;
        } catch (\Throwable $e) {
            // それ以外のエラーは想定外なのでログに残す
            Log::error($e);
            throw $e;
        }
    }
    /**
     * チャンネル詳細登録
     * @param DetailChannel $model
     * @return JsonResponse
     */
    public function insertDetailChannel(DetailChannel $model)
    {
        try {
            DB::transaction(function () use ($model) {
                $model->saveOrFail();
                DB::commit();
            });
            return ['message' => '保存に成功しました。'];
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e);
            throw $e;
        }
    }
    /**
     * ユーザーチャンネル登録
     * @param RegisterChannel $model
     * @return videoId
     */
    public function insertRegisterChannel(RegisterChannel $model)
    {
        try {
            DB::transaction(function () use ($model) {
                $model->saveOrFail();
                DB::commit();
            });
            return ['message' => '保存に成功しました。'];
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e);
            throw $e;
        }
    }

    /**
     * ユーザーチャンネル削除
     * @param int $userId
     * @return videoId
     */
    public function deleteRegisterChannelByUserId(int $id)
    {
        try {
            $model = RegisterChannel::find($id);
            DB::transaction(function () use ($model) {
                $model->destroy();
                DB::commit();
            });
            return ['message' => '削除しました。'];
        } catch (\Exception $e) {
            Log::error($e);
            throw $e;
        }
    }
}
