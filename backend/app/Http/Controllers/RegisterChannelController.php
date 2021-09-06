<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Services\API_SerchService AS SerchService;
use App\Services\DB_RepositoryService AS RepoService;
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
        // $userId = Auth::id();
        $regsterList = $this->Repo->getRegisterChannelByUserId(0);
        //チャンネルタイトル、詳細、チャンネル作成日配列をviewに返す
        // $modelFirst = reset($regsterList)[0];
        // debug($modelFirst->name);
        // debug($regsterList);
        // debug(gettype($regsterList));
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
        }
        $channelLists = $this->Channels->getFindChannelByKeywords($request->search_ch_query);
        //viewを返す
        // $channelLists = $request->search_ch_query;
        debug($channelLists);
        $channelId = "";
        return view('registerchannel.create', compact('channelLists','channelId'));
    }

    public function store(Request $request)
    {
        $channelId = $request->input('channelId');
        debug($channelId);
        // return view('registerchannel.create',compact('channelLists','channelId'));
        //登録するチャンネルがDetailChannelに登録されてるかチェック
        // $detailModel = $this->Repo->getDetailChannelByChannelId($channelId);
        // if(is_null($detailModel))
        // {
        //     //api取得
        //     $channelDetail = $this->Channels->getChannelByChannelId($channelId);
        //     $model = new DetailChannel;
        //     //Detail登録
        //     $regsterList = $this->Repo->insertDetailChannel($model);
        // }

        // //DBに登録
        // $model = new RegisterChannel;
        // $model->user_id = Auth::id();
        // $model->detail_channels_id = $channelId;
        // $regsterList = $this->Repo->insertRegisterChannel($model);

        //一覧表示画面にリダイレクト
        return redirect('registerchannel/index')；
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
        return view('registerchannel/show',compact(('detailModel')));
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
