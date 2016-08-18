<?php
namespace CheckData;

use \StandardRequest\Request as Request;

class CheckName extends InterfaceCheckData
{
    const column = 'Name';
    
    const MAX_LENGTH = 4;
    
    const MIN_LENGTH = 2;
    
    public function __construct(Request $Request)
    {
        if(isset($Request->Name))
        {
            $this->column_value = $Request->Name;
        } else {
            $this->column_value = NULL;
        }
    }
    
    public function startCheck()
    {   
        if($this->column_value != NULL)
        {//when the Name column is set.
            $length = strlen($this->column_value);
            $mb_length = mb_strlen($this->column_value);
            if($length % $mb_length == 0 && $mb_length <= MAX_LENGTH && $mb_length >= MIN_LENGTH)
            {
                return $this->successor->startCheck();
            }
        }
        return FALSE;
    }
}

