<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\API_SerchService AS SerchService;

class WatchChannelController extends Controller
{
    private $Videos;

    public function __construct(SerchService $serchService)
    {
        $this->Videos = $serchService;
    }

    public function index($id)
    {
        if(is_null($id))
        {
            return redirect()->route('registerchannel/index');
        }
        $videoLists = $this->Videos->getFindVideoByKeywords($id);
        return view('registerchannel/index', compact('videoLists'));
    }

    public function result(Request $request)
    {
        if(is_null($request->search_query))
        {
            return redirect()->route('registerchannel/index');
        }
        session(['search_query' => $request->search_query]);
        $videoLists = $this->Videos->getFindVideoByKeywords($request->search_query);
        return view('registerchannel/index', compact('videoLists'));
    }

    public function watch($id)
    {
        if(is_null($id))
        {
            return redirect()->route('registerchannel/index');
        }

        $singleVideo = $this->Videos->getVideoByVideoId($id);
        if (session('search_query')) {
            $videoLists = $this->Videos->getFindVideoByKeywords(session('search_query'));
        } else {
            $videoLists = $this->Videos->getFindVideoByKeywords('ニュース');
        }
        return view('registerchannel/watch', compact('singleVideo', 'videoLists'));
    }
}
