<?php

namespace Handler;

use \Request\InterfaceHandler as InterfaceHandler;

use \StandardRequest\Request as Request;


class HandlerSignUp extends InterfaceHandler
{
    public function __construct()
    {
        $this->handler = 'SignUp';
    }

    public function handleRequest(Request $request)
    {
        if( $this->handler == $request->getHandler() )
        {
            
        } else {
            $this->successor->handleRequest($request);
        }
    }
}

