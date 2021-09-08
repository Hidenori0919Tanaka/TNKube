<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\API_SerchService AS Service;

class WatchChannelController extends Controller
{
    private $_service;

    public function __construct(Service $service)
    {
        $this->_service = $service;
    }

    public function index(string $id)
    {
        if(empty($id))
        {
            return abort(404);
        }

        session(['session_channelId' => $id]);
        $videoLists = $this->_service->getFindVideoByChannelId($id);
        return view('watchchannel.index', compact('videoLists'));
    }

    public function result(Request $request)
    {
        if(is_null($request->search_query))
        {
            return abort(404);
        }
        session(['search_query' => $request->search_query]);
        $videoLists = $this->_service->getFindVideoByKeywords($request->search_query);
        return view('registerchannel/index', compact('videoLists'));
    }

    public function watch($id)
    {
        if(is_null($id))
        {
            return abort(404);
        }

        $singleVideo = $this->_service->getVideoByVideoId($id);
        if (session('search_query')) {
            $videoLists = $this->_service->getFindVideoByKeywords(session('search_query'));
        } else {
            $videoLists = $this->_service->getFindVideoByKeywords('ニュース');
        }
        return view('watchchannel.watch', compact('singleVideo', 'videoLists'));
    }
}
