<?php

namespace Yespbs\Egnyte\Model;

use Yespbs\Egnyte\Client as Client;
use Yespbs\Egnyte\Http\Request as Request;
use Yespbs\Egnyte\Http\Response as Response;

class User
{
    protected $request;
    protected $curl;

    public function __construct(Client $client = null, $domain=null, $oauth_token=null, $ssl = false)
    {
        if( ! $client ){
            $client = new Client( $domain, $oauth_token, $ssl, 2 );
        }   

        $this->request = $client->request;
        $this->curl = $client->curl;
    }

    /**
     * Gets user information
     *
     * @param string $id  User ID to get information for
     *
     * @return Egnyte\Http\Response Response object
     */
    public function getUser($id)
    {
        return $this->request->get('/users/'.$id);
    }

    /**
     * Gets all users
     *
     * @return Egnyte\Http\Response Response object
     */
    public function getUsers()
    {
        return $this->request->get('/users');
    }
}
