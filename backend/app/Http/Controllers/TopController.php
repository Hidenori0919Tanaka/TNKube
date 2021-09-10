<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\API_SerchService as Service_API;
use App\Services\DB_RepositoryService as Service_DB;

class TopController extends Controller
{
    private $_service_db;
    private $_service_api;

    public function __construct(Service_API $service, Service_DB $service_db)
    {
        $this->_service_api = $service;
        $this->_service_db = $service_db;
    }

    public function index()
    {
        if (session('search_query')) {
            $videoLists = $this->_service_api->getFindVideoByKeywords(session('search_query'));
        } else {
            $videoLists = $this->_service_api->getFindVideoByKeywords('ニュース');
        }

        if(is_null(Auth::id()))
        {
            return view('top.index', compact('videoLists'));
        }
        else
        {
            $regsterList = $this->_service_db->getRegisterChannelByUserId(Auth::id());
            return view('top.index', compact('videoLists','regsterList'));
        }
    }

    public function resultChannel(string $id)
    {
        if(empty($id))
        {
            return abort(404);
        }

        if(is_null(Auth::id()))
        {
            if (session('search_query')) {
                $videoLists = $this->_service_api->getFindVideoByKeywords(session('search_query'));
            } else {
                $videoLists = $this->_service_api->getFindVideoByKeywords('ニュース');
            }
            return view('top.index', compact('videoLists'));
        }
        else
        {
            session(['search_channelId' => $id]);
            $videoLists = $this->_service_api->getFindVideoByChannelId($id);
            $regsterList = $this->_service_db->getRegisterChannelByUserId(Auth::id());

            return view('top.resultChannel', compact('videoLists','regsterList'));
        }
    }



    public function result(Request $request)
    {
        if(is_null($request->search_query))
        {
            return abort(404);
        }

        if(is_null(Auth::id()))
        {
            session(['search_query' => $request->search_query]);
            $videoLists = $this->_service_api->getFindVideoByKeywords($request->search_query);
            return view('top.result', compact('videoLists'));
        }
        else if($request->input('channelCheck') == "on")
        {
            session(['search_query' => $request->search_query]);
            session(['search_channelId' => $request->channel_id]);
            $videoLists = $this->_service_api->getFindVideoByKeywordsAndChannelId( $request->channel_id ,$request->search_query);
            $regsterList = $this->_service_db->getRegisterChannelByUserId(Auth::id());
            return view('top.result', compact('videoLists','regsterList'));
        }
        else
        {
            session(['search_query' => $request->search_query]);
            $videoLists = $this->_service_api->getFindVideoByKeywords($request->search_query);
            $regsterList = $this->_service_db->getRegisterChannelByUserId(Auth::id());
            debug($request->channelCheck);
            debug($request->input('channelCheck'));
            return view('top.result', compact('videoLists','regsterList'));
        }
    }

    public function watch($id)
    {
        if(is_null($id))
        {
            return abort(404);
        }

        if(is_null(Auth::id()))
        {
            $singleVideo = $this->_service_api->getVideoByVideoId($id);
            if (session('search_query')) {
                $videoLists = $this->_service_api->getFindVideoByKeywords(session('search_query'));
            } else {
                $videoLists = $this->_service_api->getFindVideoByKeywords('ニュース');
            }
            return view('top.watch', compact('singleVideo', 'videoLists'));
        }
        else
        {
            $singleVideo = $this->_service_api->getVideoByVideoId($id);
            $regsterList = $this->_service_db->getRegisterChannelByUserId(Auth::id());

            if (session('search_channelId')) {
                $videoLists = $this->_service_api->getFindVideoByChannelId(session('search_channelId'));
            } else if(session('search_query')) {
                $videoLists = $this->_service_api->getFindVideoByKeywords(session('search_query'));
            } else {
                $videoLists = $this->_service_api->getFindVideoByKeywords('ニュース');
            }
            return view('top.watch', compact('singleVideo', 'videoLists', 'regsterList'));
        }
    }
}


