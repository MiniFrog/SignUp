<?php
namespace CheckData;

use StandardRequest\Request;

class CheckDormitory extends InterfaceCheckData
{

    public function __construct(Request $Request)
    {
        if(isset($Request->Dormitory))
        {
            $this->column_value = $Request->Dormitory;
        } else {
            $this->column_value = NULL;
        }
    }

    public function startCheck()
    {
        if ($this->column_value != NULL) {
            if (preg_match('/(?i)c^[4|8]$|^12$/', $this->column_value)) {
                return $this->successor->startCheck();
            }
        }
        return FALSE;
    }
}

