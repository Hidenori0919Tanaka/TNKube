<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Services\API_SerchService as SerchService;
use App\Models\RegisterChannel;
use App\Models\DetailChannel;
use Illuminate\Support\Facades\DB;

class RegisterChannelController extends Controller
{
    private $Channels;

    public function __construct(SerchService $serchService)
    {
        $this->Channels = $serchService;
    }

    /**
     * 登録されているチャンネル一覧
     * index.blade.php
     */
    public function index()
    {
        //登録チャンネル取得(registerChannel DB)
        $id = Auth::id();
        $registerChs = RegisterChannel::find(Auth::id());
        //チャンネルタイトル、詳細、チャンネル作成日配列をviewに返す
        return view('regch.index', compact('registerChs'));
    }

    /**
     * チャンネル検索結果と登録画面
     * create.blade.php
     */
    public function create(Request $request)
    {
        //チャンネル検索API
        if (is_null($request->search_query)) {
            return redirect()->route('regch.index');
        }
        $channelLists = $this->Videos->getFindVideoByKeywords($request->search_query);
        //viewを返す
        return view('regch.create', compact('channelLists'));
    }

    public function store(Request $request)
    {
        //登録するチャンネルがDetailChannelに登録されてるかチェック
        $registerCh = RegisterChannel::find($request->input('channelId'));
        if(is_null($registerCh))
        {
            //api取得
            $channelDetail = $this->Videos->getFindVideoByKeywords($request->input('channelId'));
            //Detail登録
            $detailCH = new DetailChannel;
            $detailCH->channelId = $request->input('channelId');
            //タイトル

            //詳細

            //登録
            $detailCH->save();
        }

        //DBに登録
        $registerCh->user_id = Auth::id();
        $registerCh->detail_channels_id = $request->input('channelId');
        $registerCh->save();

        //一覧表示画面にリダイレクト
        return redirect('regch.index');
    }

    /**
     * チャンネル詳細画面
     * show.blade.php
     */
    public function show($id)
    {
        //チャンネル詳細取得
        $registerCh = RegisterChannel::find($id);
        //viewに返す
        return view('regch.show',compact(('registerCh')));
    }

    // public function edit($id)
    // {
    //     //
    // }

    // public function update(Request $request, $id)
    // {
    //     //
    // }

    public function destroy($id)
    {
        $member=RegisterChannel::find($id);

        $member->delete();

        return redirect('regch.index');
    }
}
