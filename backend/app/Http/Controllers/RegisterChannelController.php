<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Services\API_SerchService as SerchService;
use App\Services\DB_RepositoryService as RepoService;
use App\Models\RegisterChannel;
use App\Models\DetailChannel;

class RegisterChannelController extends Controller
{
    private $Channels;
    private $Repo;

    public function __construct(SerchService $serchService, RepoService $repoService)
    {
        $this->Channels = $serchService;
        $this->Repo = $repoService;
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
            $regsterList = $this->Repo->getRegisterChannelByUserId(Auth::id());
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
            $channelLists = $this->Channels->getFindChannelByKeywords($request->search_ch_query);
            return view('registerchannel.create', compact('channelLists'));
        }
    }

    public function store(Request $request)
    {
        if (is_null($request->channelId)) {
            return abort(404);
        } else {
            //登録するチャンネルがDetailChannelに登録されてるかチェック
            $detailModel = $this->Repo->getDetailChannelExitByChannelId($request->channelId);
            if (empty($detailModel)) {
                $channelDetail = $this->Channels->getChannelByChannelId($request->channelId);
                $model = new DetailChannel;
                //Detail登録
                $model->channelId = $request->channelId;
                $model->register_channels_id = $request->channelId;
                $model->title = $channelDetail->items[0]->snippet->title;
                $model->description = $channelDetail->items[0]->snippet->description;
                $model->description = $channelDetail->items[0]->snippet->thumbnails->medium->url
                $regsterList = $this->Repo->insertDetailChannel($model);
                $detailModel = $this->Repo->getDetailChannelByChannelId($request->channelId);
            }

            $regsterList = $this->Repo->getRegisterChannelByUserIdAndDetail(Auth::id(), $detailModel->id);
            if (empty($regsterList)) {
                //DBに登録
                $model = new RegisterChannel;
                $model->user_id = Auth::id();
                $model->detail_channel_id = $detailModel->id;
                $regsterList = $this->Repo->insertRegisterChannel($model);
            }

            $channelLists = $this->Channels->getFindChannelByKeywords($request->channelId);
            return redirect('registerchannel.index', compact('channelLists'));
        }
    }

    /**
     * チャンネル詳細画面
     * show.blade.php
     */
    public function show($id)
    {
        //チャンネル詳細取得
        $detailModel = $this->Repo->getDetailChannelByChannelId($id);
        //viewに返す
        return view('registerchannel/show', compact(('detailModel')));
    }

    /**
     * 登録情報削除
     */
    public function destroy($id)
    {
        $model = $this->Repo->deleteRegisterChannelByUserId($id);

        return redirect('registerchannel/index');
    }
}
