<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\API_SerchService AS SerchService;

class HomeController extends Controller
{
    private $Videos;

    public function __construct(SerchService $serchService)
    {
        $this->Videos = $serchService;
    }

    public function index()
    {
        $videoList = $this->Videos->getFindVideoByKeywords('ニュース');
        dd($videoList);
        return view('home.index')->with('videoList',$videoList);
    }
}

