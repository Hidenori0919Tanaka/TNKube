<?php

namespace App\Repositories\API\VideoSerch;
use Google_Client;
use Google_Service_YouTube;

class VideoSerchAPIRepository implements IVideoSerchAPIRepository
{
    // private $youtube_client;
    // private $part;

    // public function __construct()
    // {
    //     $client = new Google_client();
    //     $client->setDeveloperKey(env('GOOGLE_API_KEY'));

    //     $this->youtube_client = new Google_Service_YouTube($client);

    //     $this->part = [
    //         'snippet'
    //     ];
    // }

    public function getFindVideoByKeywords(string $keywords)
    {
        try {
            $client = new Google_Client();
            $client->setDeveloperKey(env('GOOGLE_API_KEY'));

            $youtube = new Google_Service_YouTube($client);

            $part = [
                'snippet'
            ];
            $params = [
                'regionCode' => 'JP',
                'type' => 'video',
                'q'  => $keywords,
                'order'      => 'viewCount',
                'maxResults' => 12,
            ];
            $items = $youtube->search->listSearch($part, $params);
            return $items;
        } catch(Google_Service_Exception $e) {
            throw new NoUserException();
        } catch(Google_Exception $e) {
            throw new NoUserException();
        }
    }

    public function getFindChannelByKeywords(string $keywords)
    {
        try {
            $client = new Google_Client();
            $client->setDeveloperKey(env('GOOGLE_API_KEY'));

            $youtube = new Google_Service_YouTube($client);

            $part = [
                'snippet'
            ];
            $params = [
                'regionCode' => 'JP',
                'type' => 'channel',
                'q'  => $keywords,
                'order'      => 'relevance',
                'maxResults' => 12,
            ];
            $items = $youtube->search->listSearch($part, $params);
            return $items;
        } catch(Google_Service_Exception $e) {
            throw new NoUserException();
        } catch(Google_Exception $e) {
            throw new NoUserException();
        }
    }

    public function getFindVideoByChannelId(string $ChannelId)
    {
        try {
            $client = new Google_Client();
            $client->setDeveloperKey(env('GOOGLE_API_KEY'));

            $youtube = new Google_Service_YouTube($client);

            $part = [
                'snippet'
            ];
            $params = [
                'regionCode' => 'JP',
                'type' => 'video',
                'channelId'  => $ChannelId,
                'order'      => 'date',
                'maxResults' => 12,
            ];
            $items = $youtube->search->listSearch($part, $params);
            return $items;
        } catch(Google_Service_Exception $e) {
            throw new NoUserException();
        } catch(Google_Exception $e) {
            throw new NoUserException();
        }
    }

    public function getFindDetailChannelByChannelId(string $channelId)
    {
        try {
            $client = new Google_Client();
            $client->setDeveloperKey(env('GOOGLE_API_KEY'));

            $youtube = new Google_Service_YouTube($client);

            $part = [
                'snippet'
            ];
            $params = [
                'id'  => $channelId
            ];
            $items = $youtube->channels->listChannelss($part, $params);
            return $items;
        } catch(Google_Service_Exception $e) {
            throw new NoUserException();
        } catch(Google_Exception $e) {
            throw new NoUserException();
        }
    }

    public function getVideoByVideoId(string $videoId)
    {
        try {
            $client = new Google_Client();
            $client->setDeveloperKey(env('GOOGLE_API_KEY'));

            $youtube = new Google_Service_YouTube($client);

            $part = [
                'snippet'
            ];
            $params = [
                'id'  => $videoId
            ];
            $items = $youtube->videos->listVideos($part, $params);
            return $items;
        } catch(Google_Service_Exception $e) {
            throw new NoUserException();
        } catch(Google_Exception $e) {
            throw new NoUserException();
        }
    }
}
