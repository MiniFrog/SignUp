<?php
namespace CheckData;
use StandardRequest\Request;

class CheckTextArea extends InterfaceCheckData
{

    public function __construct (Request $Request)
    {
        $this->column_value = isset($Request->Interest) &&
                 isset($Request->SelfConception) &&
                 isset($Request->SectorAwareness) && isset($Request->Experience);
        if ($this->column_value) {
            $this->column_value = (mb_strlen($Request->Interest, 'UTF-8') < 65535) &&
                     (mb_strlen($Request->SelfConception, 'UTF-8') < 65535) &&
                     (mb_strlen($Request->SectorAwareness, 'UTF-8') < 65535) &&
                     (mb_strlen($Request->Experience, 'UTF-8') < 65535);
        }
    }

    public function startCheck ()
    {
        if ($this->column_value) {
            return $this->successor->startCheck();
        } else {
            return FALSE;
        }
    }
}

