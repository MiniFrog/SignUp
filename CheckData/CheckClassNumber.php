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
            if( mb_strlen($this->column_value) < 5 && mb_strlen($this->column_value) > 1 )
            {
                return $this->successor->startCheck();
            }
        }
        return FALSE;
    }
}

