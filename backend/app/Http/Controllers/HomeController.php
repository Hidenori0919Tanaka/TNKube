<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\API\VideoSerch\IVideoSerchAPIRepository AS GetSerchVideo;

class HomeController extends Controller
{
    protected $Video;

    public function __construct(GetSerchVideo $GetSerchVideo)
    {
        $this->Video = $GetSerchVideo;
    }

    public function index()
    {
        // $start = microtime(true);
        // $memory = memory_get_usage();

        // ここでデータ取得を行う
        $videoList = $this->Video->getFindVideoByKeywords('ニュース');

        // $result = [
        //     // どちらのリポジトリを使用しているかわかるように
        //     'name'      => get_class($this->User),
        //     // 実行時間
        //     'time'      => microtime(true) - $start,
        //     // 使用メモリ
        //     'memory'    => (memory_get_peak_usage() - $memory) / (1024 * 1024)
        // ];

        // 結果出力
        // return $this->Video;
        return view('home.index')->with('videoList',$videoList);
    }
}

