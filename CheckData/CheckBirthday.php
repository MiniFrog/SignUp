<?php
namespace CheckData;

use StandardRequest\Request;

class CheckBirthday extends InterfaceCheckData
{

    public function __construct(Request $Request)
    {
        if(isset($Request->Birthday))
        {
            $this->column_value = $Request->Birthday;
        } else {
            $this->column_value = NULL;
        }
    }

    public function startCheck()
    {
        if($this->column_value != NULL)
        {
            if(preg_match('/^(19|20)\d{2}-(1[0-2]|0?[1-9])-(0?[1-9]|[1-2][0-9]|3[0-1])$/', $this->column_value))
            {
                return $this->successor->startCheck();
            }
        }
        return FALSE;
    }
}

