<?php

namespace App\Services;

use App\Repositories\API\VideoSerch\IVideoSerchAPIRepository as GetSerch;
use App\Models\API\ExtractData;

class API_SerchService
{
    protected $getSerch;

    public function __construct(GetSerch $getSerch)
    {
        $this->getSerch = $getSerch;
    }

    /**
     * 動画 一覧取得
     * @param string $keywords
     * @return JsonResponse
     */
    public function getFindVideoByKeywords(string $keywords)
    {
        $data = $this->getSerch->getFindVideoByKeywords($keywords);
        $extract = new ExtractData();
        $videos = $extract->extract_snippect($data);
        return $videos;
    }

    //動画検索のダミーデータ(動画タイトル)
    /**
     * 動画一覧ダミーデータ取得
     * @param string $keywords
     * @return JsonResponse
     */
    public function d_GetFindVideoByKeywords(string $keywords)
    {
        $json = array(
            "0" => array(
                "kind" => "",
                "etag" => "",
                "nextPageToken" => "",
                "regionCode" => "JP",
                "pageInfo" => array(
                    "totalResults" => "",
                    "resultsPerPage" => ""
                ),
                "items" => array(
                    "kind" => "",
                    "etag" => "",
                    "id" => array(
                        "kind" => "",
                        "videoId" => ""
                    ),
                    "snippet" => array(
                        "publishedAt" => "",
                        "channelId" => "",
                        "title" => "",
                        "description" => "",
                        "thumbnails" => array(
                            "default" => array(
                                "url" => "",
                                "width" => "",
                                "height" => ""
                            ),
                            "medium" => array(
                                "url" => "",
                                "width" => "",
                                "height" => ""
                            ),
                            "high" => array(
                                "url" => "",
                                "width" => "",
                                "height" => ""
                            )
                        ),
                        "channelTitle" => "",
                        "liveBroadcastContent" => "",
                        "publishTime" => ""
                    )
                )
            )
        );

        return $json;
    }

    //動画検索のエラーデータ（動画タイトル）


    //snippet
    // public function extract_snippect(object $data)
    // {
    //     $snippets = collect($data->getItems())->pluck('snippet')->all();
    //     return $snippets;
    // }

}
