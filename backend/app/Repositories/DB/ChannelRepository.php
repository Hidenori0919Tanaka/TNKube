<?php

namespace App\Repositories\DB;

use App\Models\Register_channel;
use App\Models\Detail_channel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ChannelRepository implements IChannelRepository
{
    /**
     * 登録チャンネル取得
     * @param int $userId
     * @return Collection
     */
    public function getRegisterChannelByUserId(int $userId)
    {
        try {
            $registerChs = Register_channel::where('user_id',$userId)->join('detail_channels','register_channels.channel_id','=','detail_channels.channel_id')->get();
            return $registerChs;
        } catch (\Exception $e) {
            Log::error($e);
            throw $e;
        }
    }

    /**
     * 登録チャンネル取得
     * @param int $userId
     * @return Register_channel
     */
    public function getRegisterChannelByUserIdAndDetail(int $userId, string $detailChannelId)
    {
        try {
            $registerChs = Register_channel::where('user_id' ,$userId)->where('channel_id', $detailChannelId)->first();
            return $registerChs;
        } catch (\Exception $e) {
            Log::error($e);
            throw $e;
        }
    }


    /**
     * チャンネル詳細取得
     * @param string $channelId
     * @return Detail_channel
     */
    public function getDetailChannelByChannelId(string $channelId)
    {
        try {
            $registerChs = Detail_channel::where('channel_id', $channelId)->first();
            return $registerChs;
        } catch (ModelNotFoundException $e) {
            throw $e;
        } catch (\Throwable $e) {
            Log::error($e);
            throw $e;
        }
    }

    /**
     * チャンネル詳細取得
     * @param string $channelId
     * @return Detail_channel
     */
    public function getDetailChannelExitByChannelId(string $channelId)
    {
        try {
            $registerChs = Detail_channel::find($channelId);
            return $registerChs;
        } catch (ModelNotFoundException $e) {
            throw $e;
        } catch (\Throwable $e) {
            Log::error($e);
            throw $e;
        }
    }

    /**
     *チャンネル詳細登録又は取得
     *@param Detail_channel $model
     *@return Detail_channel
     */
    public function firstCreateDetailChannelByChannelId(Detail_channel $model)
    {
        try {
            $returnModel = DB::transaction(function () use ($model) {
                $model = Detail_channel::firstOrCreate([
                    'channel_id' => $model->channel_id
                ],[
                    'channel_id'=>$model->channel_id,
                    'title'=>$model->title,
                    'description'=>$model->description,
                    'thumbnail'=>$model->thumbnail,
                    'published'=>$model->published,
                    'country' => $model->country,
                    'customUrl' => $model->customUrl,
                    'defaultLanguage' => $model->defaultLanguage,
                ]);
                DB::commit();
                return $model;
            });
            return $returnModel;
        } catch (ModelNotFoundException $e) {
            throw $e;
        } catch (\Throwable $e) {
            Log::error($e);
            throw $e;
        }
    }
    /**
     * チャンネル詳細登録
     * @param DetailChannel $model
     * @return array
     */
    public function createDetailChannel(Detail_channel $model)
    {
        try {
            DB::transaction(function () use ($model) {
                $model = Detail_channel::create([
                    'channel_id'=>$model->channel_id,
                    'title'=>$model->title,
                    'description'=>$model->description,
                    'thumbnail'=>$model->thumbnail,
                    'published'=>$model->published,
                    'country' => $model->country,
                    'customUrl' => $model->customUrl,
                    'defaultLanguage' => $model->defaultLanguage,
                ]);
                DB::commit();
                return ['msg' => 'OK'];
            });
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e);
            throw $e;
        }
    }

    /**
     *ユーザーチャンネル登録又は取得
     * @param Register_channel $channelId
     * @param string $userId
     * @return Register_channel
     */
    public function firstCreateRegisterChannel($channelId, $userId)
    {
        try {
            DB::transaction(function () use ($channelId, $userId) {
                $model = Register_channel::firstOrCreate([
                    'user_id' => $userId,
                    'channel_id' => $channelId
                ],[
                    'user_id' => $userId,
                    'channel_id' => $channelId
                ]);
                DB::commit();
                return $model;
            });
        } catch (ModelNotFoundException $e) {
            throw $e;
        } catch (\Throwable $e) {
            Log::error($e);
            throw $e;
        }
    }
    /**
     * ユーザーチャンネル登録
     * @param RegisterChannel $model
     * @return array
     */
    public function createRegisterChannel($channelId, $userId)
    {
        try {
            DB::transaction(function () use ($channelId, $userId) {
                Register_channel::create([
                    'user_id' => $userId,
                    'channel_id' => $channelId
                ]);
                DB::commit();
                return ['msg' => 'OK'];
            });
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e);
            throw $e;
        }
    }

    /**
     * ユーザーチャンネル削除
     * @param int $userId
     * @return array
     */
    public function deleteRegisterChannelByUserId(int $userId,string $channelId)
    {
        try {
            DB::transaction(function () use ($userId, $channelId){
                Register_channel::where('user_id',$userId)->where('channel_id',$channelId)->first()->delete();
                DB::commit();
            });
            return ['msg' => 'OK'];
        } catch (\Exception $e) {
            Log::error($e);
            throw $e;
        }
    }

    /**
     * チャンネル詳細登録チェック
     * @param string $channelId
     * @return bool
     */
    public function existDetailChannelByChannelId(string $channelId)
    {

        try {
            return Detail_channel::where('channel_id',$channelId)->exists();
        } catch (\Exception $e) {
            Log::error($e);
            throw $e;
        }
    }
}
