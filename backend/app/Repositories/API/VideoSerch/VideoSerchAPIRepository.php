<?php

namespace App\Repositories\API\VideoSerch;
use Google_Client;
use Google_Service_YouTube;

class VideoSerchAPIRepository implements IVideoSerchAPIRepository
{
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

            $snippets = collect($items->getItems())->pluck('snippet')->all();
            return $snippets;
        } catch(Google_Service_Exception $e) {
            throw new NoUserException();
        } catch(Google_Exception $e) {
            throw new NoUserException();
        }
    }
}