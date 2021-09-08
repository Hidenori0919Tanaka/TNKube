<?php

namespace App\Repositories\API\Channels;
use Google_Client;
use Google_Service_YouTube;
use Google_Service_Exception;
use Google_Exception;

class ChannelsRepository implements ChannelsInterfaceRepository
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

        $this->_params = [];
    }

    public function getChannelByChannelId(string $channelId)
    {
        try
        {
            $params = array_merge($this->_params, array('id' => $channelId));
            $items = $this->_youtubeClient->channels->listChannels($this->_part, $params);
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
