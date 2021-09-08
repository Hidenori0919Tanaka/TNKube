<?php

namespace App\Repositories\API\Videos;
use Google_Client;
use Google_Service_YouTube;
use Google_Service_Exception;
use Google_Exception;

class VideosRepository implements VideosInterfaceRepository
{
    private $_youtubeClient;
    private $_part;

    public function __construct()
    {
        $client = new Google_client();
        $client->setDeveloperKey(config('services.youtube.key'));

        $this->_youtubeClient = new Google_Service_YouTube($client);

        $this->_part = [
            'snippet'
        ];
    }

    public function getVideoByVideoId(string $videoId)
    {   
        try {
            $client = new Google_Client();
            $client->setDeveloperKey(config('services.youtube.key'));

            $youtube = new Google_Service_YouTube($client);

            $part = [
                'snippet'
            ];
            $params = [
                'id'  => $videoId
            ];
            $items = $this->_youtubeClient->videos->listVideos($this->_part, $params);
            return $items;
        } catch(Google_Service_Exception $e) {
            throw new NoUserException();
        } catch(Google_Exception $e) {
            throw new NoUserException();
        }
    }
}
