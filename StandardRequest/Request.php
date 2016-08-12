<?php
namespace StandardRequest;

class Request implements InterfaceStandardRequest
{

    protected $post;
    
    public function __construct()
    {
        if(get_magic_quotes_gpc())
        {//check if the magic method is used.
            foreach ($_POST as $value)
            {
                $this->post[] = trim($value);
            }
        } else {
            foreach ($_POST as $value)
            {
                $this->post[] = addslashes( trim($value) );
            }
        }
        
    }

    public function __get($name)
    {
        return $this->post[$name];
    }

    public function getHandler()
    {
        return $this->post['Handler'];
    }
}

