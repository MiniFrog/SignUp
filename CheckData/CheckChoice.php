<?php
namespace CheckData;

use StandardRequest\Request;

class CheckChoice extends InterfaceCheckData
{

    public function __construct(Request $Request)
    {
        if( isset($Request->FirstChoice) && isset($Request->SecondChoice) )
        {
            $this->column_value[] = $Request->FirstChoice;
            $this->column_value[] = $Request->SecondChoice;
        } else {
            $this->column_value = NULL;
        }
    }

    public function startCheck()
    {
        if($this->column_value != NULL)
        {
            $first_choice = array( 1, 2, 3 );
            $second_choice = array( 1, 2, 3, 4 );
            if( in_array($this->column_value[0], $first_choice) && in_array($this->column_value[1], $second_choice) )
            {
                return $this->successor->startCheck();    
            }
        }
        return FALSE;
    }
}

