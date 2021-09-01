<?php

namespace App\Repositories\API\VideoSerch;
use Google_Client;
use Google_Service_YouTube;

class DummyVideoSerchAPI
{
    public function getFindVideoByKeywords()
    {
        $array = array(
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
                        "title" => "title",
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
        $json = json_encode( $array ) ;
        $object = (object)$json;
        return $object;
    }
}
