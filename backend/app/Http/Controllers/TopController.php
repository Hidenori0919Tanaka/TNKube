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

    public function result(Request $request)
    {
        if(is_null($request->search_query))
        {
            return abort(404);
        }
        session(['search_query' => $request->search_query]);
        $videoLists = $this->_service_api->getFindVideoByKeywords($request->search_query);
        return view('top.result', compact('videoLists'));
    }

    public function watch($id)
    {
        if(is_null($id))
        {
            return abort(404);
        }

        $singleVideo = $this->_service_api->getVideoByVideoId($id);
        if (session('search_query')) {
            $videoLists = $this->_service_api->getFindVideoByKeywords(session('search_query'));
        } else {
            $videoLists = $this->_service_api->getFindVideoByKeywords('ニュース');
        }
        return view('top.watch', compact('singleVideo', 'videoLists'));
    }
}

