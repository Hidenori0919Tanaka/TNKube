<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\API_RepositoryService as Service_API;
use App\Services\DB_RepositoryService as Service_DB;
use App\Services\MasterService as Service_Master;
use App\Models\Register_channel;
use App\Models\Detail_channel;
use Illuminate\Support\Facades\Validator;

class RegisterChannelController extends Controller
{
    private $_service_api;
    private $_service_db;
    private $_service_master;

    public function __construct(Service_API $service_api, Service_DB $service_db, Service_Master $service_master)
    {
        $this->_service_api = $service_api;
        $this->_service_db = $service_db;
        $this->_service_master = $service_master;
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
            $addColumn = new Detail_channel();
            $regsterList = $addColumn->addViewColumn($regsterList);
            return view('registerchannel.index', compact('regsterList'));
        }
    }

    /**
     * チャンネル検索結果と登録画面
     * create.blade.php
     */
    public function create(Request $request)
    {
        // バリデーションの追加
        $validator = Validator::make($request->all(), [
            'search_ch_query' => 'required'
        ],[
            'search_ch_query.required' => '検索キーワードを入力してください'
        ]);
        //チャンネル検索API
        if ($validator->fails()) {
            if (is_null(Auth::id())) {
                return abort(404);
            } else {
                $regsterViewList = $this->_service_db->getRegisterChannelByUserId(Auth::id());
                $regsterList = $this->_service_db->getRegisterChannelByUserId(Auth::id());
                return redirect('registerchannel/index')->with('regsterViewList','regsterList')
                ->withErrors($validator);
            }
        } else {
            $channelViewList = $this->_service_api->getFindChannelByKeywords($request->search_ch_query);
            $regsterList = $this->_service_db->getRegisterChannelByUserId(Auth::id());
            $checkReg = new Register_channel();
            $channelViewList = $checkReg->checkRegister($channelViewList, $regsterList);
            return view('registerchannel.create', compact('channelViewList','regsterList'));
        }
    }

    /**
     *
     *
     */
    public function store(Request $request)
    {
        // バリデーションの追加
        $validator = Validator::make($request->all(), [
            'channelId' => 'required'
        ],[
            'channelId' => 'チャンネル情報を取得できませんでした'
        ]);
        if ($validator->fails()) {
            $regsterViewList = $this->_service_db->getRegisterChannelByUserId(Auth::id());
            $regsterList = $this->_service_db->getRegisterChannelByUserId(Auth::id());
            return redirect('registerchannel/index')->with('regsterViewList','regsterList')
            ->withErrors($validator);
        } else {
            if(!$this->_service_db->existDetailChannelByChannelId($request->channelId))
            {
                $this->_service_master->channelMasterRegister($request->channelId);
            }
            $this->_service_db->createRegisterChannel($request->channelId,Auth::id());
            return redirect('registerchannel/index');
        }
    }

    /**
     * チャンネル詳細画面
     * show.blade.php
     */
    public function show($id)
    {
        if (is_null($id)) {
            return abort(404);
        }
        //チャンネル詳細取得
        $detailModel = $this->_service_db->getDetailChannelByChannelId($id);
        $regsterList = $this->_service_db->getRegisterChannelByUserId(Auth::id());
        return view('registerchannel.show', compact('detailModel', 'regsterList'));
    }

    /**
     * 登録情報削除
     */
    public function destroy($channelId)
    {
        if (is_null($channelId)) {
            return abort(404);
        }
        $this->_service_db->deleteRegisterChannelByUserId(Auth::id(),$channelId);
        return redirect('registerchannel/index');
    }
}
