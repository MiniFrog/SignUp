<?php

function autoLoad( $class_name )
{
	$file_path = str_replace('\\', '/', $class_name) . '.php';
	if( file_exists( $file_path ) ) 
	{
		include_once( $file_path );
	}
}

spl_autoload_register('autoLoad');

Class Client
{
    
    protected $query;
    
    public function __construct()
    {
        $this->query = $_POST['query'];
    }
       
}