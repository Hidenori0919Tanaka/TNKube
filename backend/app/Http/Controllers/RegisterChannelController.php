<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Services\API_SerchService as Service_API;
use App\Services\DB_RepositoryService as Service_DB;
use App\Models\RegisterChannel;
use App\Models\DetailChannel;

class RegisterChannelController extends Controller
{
    private $_service_api;
    private $_service_db;

    public function __construct(Service_API $service_api, Service_DB $service_db)
    {
        $this->_service_api = $service_api;
        $this->_service_db = $service_db;
    }

    /**
     * 登録されているチャンネル一覧
     * index.blade.php
     */
    public function index()
    {
        if (is_null(Auth::id())) {
            return abort(404);
        } else {
            $regsterList = $this->_service_db->getRegisterChannelByUserId(Auth::id());
        }
        debug($regsterList);
        return view('registerchannel.index', compact('regsterList'));
    }

    /**
     * チャンネル検索結果と登録画面
     * create.blade.php
     */
    public function create(Request $request)
    {
        //チャンネル検索API
        if (is_null($request->search_ch_query)) {
            return abort(404);
        } else {
            $channelLists = $this->_service_api->getFindChannelByKeywords($request->search_ch_query);
            return view('registerchannel.create', compact('channelLists'));
        }
    }

    public function store(Request $request)
    {
        if (is_null($request->channelId)) {
            return abort(404);
        } else {
            //登録するチャンネルがDetailChannelに登録されてるかチェック
            $detailModel = $this->_service_db->getDetailChannelExitByChannelId($request->channelId);
            if (empty($detailModel)) {
                $channelDetail = $this->Channels->getChannelByChannelId($request->channelId);
                $model = new DetailChannel;
                //Detail登録
                $model->channel_Id = $request->channelId;
                $model->title = $channelDetail->items[0]->snippet->title;
                $model->description = $channelDetail->items[0]->snippet->description;
                $model->thumbnail = $channelDetail->items[0]->snippet->thumbnails->medium->url;
                $regsterList = $this->_service_db->insertDetailChannel($model);
                // $detailModel = $this->Repo->getDetailChannelByChannelId($request->channelId);
            }

            $regsterList = $this->_service_db->getRegisterChannelByUserIdAndDetail(Auth::id(), $request->channelId);
            if (empty($regsterList)) {
                //DBに登録
                $model = new RegisterChannel;
                $model->user_id = Auth::id();
                $model->channel_Id = $request->channelId;
                $regsterList = $this->_service_db->insertRegisterChannel($model);
            }

            // $channelLists = $this->Channels->getFindChannelByKeywords($request->channelId);
            return redirect('registerchannel/index');
        }
    }

    /**
     * チャンネル詳細画面
     * show.blade.php
     */
    public function show($id)
    {
        // $detailModel = $this->Repo->getDetailChannelExitByChannelId($id);
        //チャンネル詳細取得
        $detailModel = $this->_service_db->getDetailChannelByChannelId($id);
        //viewに返す
        debug($detailModel);
        return view('registerchannel/show', compact(('detailModel')));
    }

    /**
     * 登録情報削除
     */
    public function destroy($channelId)
    {
        $model = $this->_service_db->deleteRegisterChannelByUserId(Auth::id(),$channelId);

        return redirect('registerchannel/index');
    }
}
