<?php

namespace App\Repositories\API\VideoSerch;
use Google_Client;
use Google_Service_YouTube;

class DummyVideoSerchAPI implements IVideoSerchAPIRepository
{
    public function getFindVideoByKeywords(string $keywords)
    {
        $json = Array(
            "0" => Array(
                "kind" => "",
                "etag" => "",
                "nextPageToken" => "",
                "regionCode" => "JP",
                "pageInfo" => Array(
                    "totalResults" => "",
                    "resultsPerPage" => ""
                ),
                "items" => Array(
                    "kind" => "",
                    "etag" => "",
                    "id" => Array(
                        "kind" => "",
                        "videoId" => ""
                    ),
                    "snippet" => Array(
                        "publishedAt" => "",
                        "channelId" => "",
                        "title" => "",
                        "description" => "",
                        "thumbnails" => Array(
                            "default" => Array(
                                "url" => "",
                                "width" => "",
                                "height" => ""
                            ),
                            "medium" => Array(
                                "url" => "",
                                "width" => "",
                                "height" => ""
                            ),
                            "high" => Array(
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
}