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
            // $registerChs = RegisterChannel::with('detailChannels')->where('user_id',$userId)->get();
            $registerChs = RegisterChannel::where('user_id',$userId)->join('detail_channels','register_channels.channel_Id','=','detail_channels.channel_Id')->get();
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
    public function getRegisterChannelByUserIdAndDetail(int $userId, string $detailChannelId)
    {
        try {
            $registerChs = RegisterChannel::where('user_id' ,$userId)->where('channel_Id', $detailChannelId)->first();
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
            $registerChs = DetailChannel::find($channelId)->get();
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
    public function firstCreateDetailChannelByChannelId(DetailChannel $model)
    {
        try {
            $returnModel = DB::transaction(function () use ($model) {
                $model = DetailChannel::firstOrCreate([
                    'channel_Id' => $model->channel_Id
                ],[
                    'channel_Id'=>$model->channel_Id,
                    'title'=>$model->title,
                    'description'=>$model->description,
                    'thumbnail'=>$model->thumbnail
                ]);
                DB::commit();
                return $model;
            });
            return $returnModel;
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
    public function firstCreateRegisterChannel(RegisterChannel $model)
    {
        try {
            $returnModel = DB::transaction(function () use ($model) {
                $model = RegisterChannel::firstOrCreate([
                    'user_id' => $model->user_id,
                    'channel_Id' => $model->channel_Id
                ],[
                    'user_id' => $model->user_id,
                    'channel_Id' => $model->channel_Id
                ]);
                DB::commit();
                return $model;
            });
            return $returnModel;
        } catch (ModelNotFoundException $e) {
            throw $e;
        } catch (\Throwable $e) {
            // それ以外のエラーは想定外なのでログに残す
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
    public function deleteRegisterChannelByUserId(int $userId,string $channelId)
    {
        try {
            // $model = RegisterChannel::where('user_id',$userId)->where('channel_Id',$channelId)->first();
            DB::transaction(function () use ($userId, $channelId){
                RegisterChannel::where('user_id',$userId)->where('channel_Id',$channelId)->first()->delete();
                DB::commit();
            });
            return ['message' => '削除しました。'];
        } catch (\Exception $e) {
            Log::error($e);
            throw $e;
        }
    }
}
