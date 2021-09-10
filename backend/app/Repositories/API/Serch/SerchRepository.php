<?php

namespace App\Repositories\API\Serch;
use Google_Client;
use Google_Service_YouTube;
use Google_Service_Exception;
use Google_Exception;

class SerchRepository implements SerchInterfaceRepository
{
    private $_youtubeClient;
    private $_part;
    private $_params;

    public function __construct()
    {
        $client = new Google_client();
        $client->setDeveloperKey(config('services.youtube.key'));

        $this->_youtubeClient = new Google_Service_YouTube($client);

        $this->_part = [
            'snippet'
        ];

        $this->_params = [
            'regionCode' => 'JP',
            'order'      => 'viewCount',
            'maxResults' => 12,
        ];
    }

    public function getFindVideoByKeywords(string $keywords)
    {
        try
        {
            $params = array_merge($this->_params, array('type' => 'video'),array('q' => $keywords));
            // $this->_params =
            $items = $this->_youtubeClient->search->listSearch($this->_part, $params);
            return $items;
        }
        catch(Google_Service_Exception $e)
        {
            //Log

            //Throw
            throw new NoUserException();
        }
        catch(Google_Exception $e)
        {
            //Log

            //Throw
            throw new NoUserException();
        }
    }

    public function getFindVideoByKeywordsAndChannelId(string $channelId ,string $keywords)
    {
        try
        {
            $params = array_merge($this->_params, array('type' => 'video'), array('channelId' => $channelId), array('q' => $keywords));
            // $this->_params =
            $items = $this->_youtubeClient->search->listSearch($this->_part, $params);
            return $items;
        }
        catch(Google_Service_Exception $e)
        {
            //Log

            //Throw
            throw new NoUserException();
        }
        catch(Google_Exception $e)
        {
            //Log

            //Throw
            throw new NoUserException();
        }
    }

    public function getFindChannelByKeywords(string $keywords)
    {
        try
        {
            $params = array_merge($this->_params, array('type' => 'channel'),array('q' => $keywords));
            $items = $this->_youtubeClient->search->listSearch($this->_part, $params);
            return $items;
        }
        catch(Google_Service_Exception $e)
        {
            throw new NoUserException();
        }
        catch(Google_Exception $e)
        {
            throw new NoUserException();
        }
    }

    public function getFindVideoByChannelId(string $channelId)
    {
        try
        {
            $params = array_merge($this->_params, array('type' => 'video'),array('channelId' => $channelId));
            $items = $this->_youtubeClient->search->listSearch($this->_part, $params);
            return $items;
        }
        catch(Google_Service_Exception $e)
        {
            throw new NoUserException();
        }
        catch(Google_Exception $e)
        {
            throw new NoUserException();
        }
    }
}
