<?php
namespace CheckData;

use StandardRequest\Request;

class CheckClassNumber extends InterfaceCheckData
{

    public function __construct(Request $Request)
    {
        if( isset($Request->ClassNumber) )
        {
            $this->column_value = $Request->ClassNumber;
        } else {
            $this->column_value = NULL;
        }
    }

    public function startCheck()
    {
        if( $this->column_value != NULL )
        {
            $class_number = array( 1, 2, 3, 4, 5 );
            if( in_array($this->column_value, $class_number) )
            {
                return $this->successor->startCheck();
            }
        }
        return FALSE;
    }
}

