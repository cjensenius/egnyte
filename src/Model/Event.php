<?php

namespace Yespbs\Egnyte\Model;

use Yespbs\Egnyte\Client as Client;
use Yespbs\Egnyte\Http\Request as Request;
use Yespbs\Egnyte\Http\Response as Response;

class Event
{
    protected $request;
    protected $curl;

    public function __construct(Client $client = null, $domain=null, $oauth_token=null, $ssl = false)
    {
        if( ! $client ){
            $client = new Client( $domain, $oauth_token, $ssl );
        }   

        $this->request = $client->request;
        $this->curl = $client->curl;
    }

    /**
     * Get events cursor.
     * https://developers.egnyte.com/docs/read/Events_API
     *
     * @return Egnyte\Http\Response Response object
     */
    public function getCursor()
    {
        $path = Request::pathEncode($path);
        return $this->request->get('/events/cursor');
    }

    /**
     * Gets event listing
     *
     * @param string $id  Cursor ID to get event stream for
     *
     * @return Egnyte\Http\Response Response object
     */
    public function getEvents($id)
    {
        return $this->request->get('/events?'.http_build_query(['id' => $id]));
    }
}
