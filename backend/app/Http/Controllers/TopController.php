<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\API_SerchService AS SerchService;

class TopController extends Controller
{
    private $Videos;

    public function __construct(SerchService $serchService)
    {
        $this->Videos = $serchService;
    }

    public function index()
    {
        if (session('search_query')) {
            $videoLists = $this->Videos->getFindVideoByKeywords(session('search_query'));
        } else {
            $videoLists = $this->Videos->getFindVideoByKeywords('ニュース');
        }
        // $modelFirst = reset($regsterList)[0];
        // debug($modelFirst->name);
        debug($videoLists);
        return view('top.index', compact('videoLists'));
    }

    public function result(Request $request)
    {
        if(is_null($request->search_query))
        {
            return abort(404);
        }
        session(['search_query' => $request->search_query]);
        $videoLists = $this->Videos->getFindVideoByKeywords($request->search_query);
        return view('top.result', compact('videoLists'));
    }

    public function watch($id)
    {
        if(is_null($id))
        {
            return abort(404);
        }

        $singleVideo = $this->Videos->getVideoByVideoId($id);
        if (session('search_query')) {
            $videoLists = $this->Videos->getFindVideoByKeywords(session('search_query'));
        } else {
            $videoLists = $this->Videos->getFindVideoByKeywords('ニュース');
        }
        return view('top.watch', compact('singleVideo', 'videoLists'));
    }
}

