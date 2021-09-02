<?php

namespace App\Repositories\API\VideoSerch;

use Google_Client;
use Google_Service_YouTube;

class DummyVideoSerchAPI
{
    public function getFindVideoByKeywords()
    {
        $object = (object)[
            "kind" => "",
            "etag" => "",
            "nextPageToken" => "",
            "regionCode" => "JP",
            "pageInfo" => (object)[
                "totalResults" => "",
                "resultsPerPage" => ""
            ],
            "items" => (object)[
                "kind" => "a",
                "etag" => "a",
                "id" => (object)[
                    "kind" => "a",
                    "videoId" => "a"
                ],
                "snippet" => (object)[
                    "publishedAt" => "a",
                    "channelId" => "a",
                    "title" => "title",
                    "description" => "a",
                    "thumbnails" => (object)[
                        "default" => (object)[
                            "url" => "a",
                            "width" => "a",
                            "height" => "a"
                        ],
                        "medium" => (object)[
                            "url" => "a",
                            "width" => "a",
                            "height" => "a"
                        ],
                        "high" => (object)[
                            "url" => "a",
                            "width" => "a",
                            "height" => "a"
                        ]
                    ],
                    "channelTitle" => "a",
                    "liveBroadcastContent" => "a",
                    "publishTime" => "a"
                ]
            ]
        ];
        return $object;
    }

    public function getFindChannelByKeywords()
    {
        $object = (object)[
            "kind" => "",
            "etag" => "",
            "nextPageToken" => "",
            "regionCode" => "JP",
            "pageInfo" => (object)[
                "totalResults" => "",
                "resultsPerPage" => ""
            ],
            "items" => (object)[
                "kind" => "a",
                "etag" => "a",
                "id" => (object)[
                    "kind" => "a",
                    "videoId" => "a"
                ],
                "snippet" => (object)[
                    "publishedAt" => "a",
                    "channelId" => "a",
                    "title" => "title",
                    "description" => "a",
                    "thumbnails" => (object)[
                        "default" => (object)[
                            "url" => "a"
                        ],
                        "medium" => (object)[
                            "url" => "a"
                        ],
                        "high" => (object)[
                            "url" => "a"
                        ]
                    ],
                    "channelTitle" => "title",
                    "liveBroadcastContent" => "a",
                    "publishTime" => "a"
                ]
            ]
        ];
        return $object;
    }

    public function getFindVideoByChannelId()
    {
        $object = (object)[
            "kind" => "",
            "etag" => "",
            "nextPageToken" => "",
            "regionCode" => "JP",
            "pageInfo" => (object)[
                "totalResults" => "",
                "resultsPerPage" => ""
            ],
            "items" => (object)[
                "kind" => "a",
                "etag" => "a",
                "id" => (object)[
                    "kind" => "a",
                    "videoId" => "a"
                ],
                "snippet" => (object)[
                    "publishedAt" => "a",
                    "channelId" => "a",
                    "title" => "title",
                    "description" => "a",
                    "thumbnails" => (object)[
                        "default" => (object)[
                            "url" => "a",
                            "width" => "a",
                            "height" => "a"
                        ],
                        "medium" => (object)[
                            "url" => "a",
                            "width" => "a",
                            "height" => "a"
                        ],
                        "high" => (object)[
                            "url" => "a",
                            "width" => "a",
                            "height" => "a"
                        ]
                    ],
                    "channelTitle" => "a",
                    "liveBroadcastContent" => "a",
                    "publishTime" => "a"
                ]
            ]
        ];
        return $object;
    }

    public function multipleDummydata()
    {
        $object = (object)[
            "kind" => "",
            "etag" => "",
            "nextPageToken" => "",
            "regionCode" => "JP",
            "pageInfo" => (object)[
                "totalResults" => "",
                "resultsPerPage" => ""
            ],
            "items" => (object)[
                "kind" => "a",
                "etag" => "a",
                "id" => (object)[
                    "kind" => "a",
                    "videoId" => "a"
                ],
                "snippet" => (object)[
                    "publishedAt" => "a",
                    "channelId" => "a",
                    "title" => "title",
                    "description" => "a",
                    "thumbnails" => (object)[
                        "default" => (object)[
                            "url" => "a",
                            "width" => "a",
                            "height" => "a"
                        ],
                        "medium" => (object)[
                            "url" => "a",
                            "width" => "a",
                            "height" => "a"
                        ],
                        "high" => (object)[
                            "url" => "a",
                            "width" => "a",
                            "height" => "a"
                        ]
                    ],
                    "channelTitle" => "a",
                    "liveBroadcastContent" => "a",
                    "publishTime" => "a"
                ]
                ],
                [
                    "kind" => "b",
                    "etag" => "b",
                    "id" => (object)[
                        "kind" => "b",
                        "videoId" => "b"
                    ],
                    "snippet" => (object)[
                        "publishedAt" => "b",
                        "channelId" => "b",
                        "title" => "title",
                        "description" => "b",
                        "thumbnails" => (object)[
                            "default" => (object)[
                                "url" => "b",
                                "width" => "b",
                                "height" => "b"
                            ],
                            "medium" => (object)[
                                "url" => "b",
                                "width" => "b",
                                "height" => "b"
                            ],
                            "high" => (object)[
                                "url" => "b",
                                "width" => "b",
                                "height" => "b"
                            ]
                        ],
                        "channelTitle" => "b",
                        "liveBroadcastContent" => "b",
                        "publishTime" => "b"
                    ]
                ]
        ];
        return $object;
    }
}
