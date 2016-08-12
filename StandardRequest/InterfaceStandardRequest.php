<?php
namespace StandardRequest;

interface InterfaceStandardRequest
{
    public function getRequest();
    //返回请求的内容
    
    public function __get($name);
}

