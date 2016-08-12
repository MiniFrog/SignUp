<?php
namespace StandardRequest;

class Request implements InterfaceStandardRequest
{

    protected $post;
    
    public function __construct()
    {
        $this->post = $_POST;
    }

    public function __get($name)
    {
        return $this->post[$name];
    }

    public function getRequest()
    {
        return $this->post['Handler'];
    }
}

