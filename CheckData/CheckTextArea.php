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
            $this->column_value = (strlen($Request->Interest) < 201) &&
                     (strlen($Request->SelfConception) < 201) &&
                     (strlen($Request->SectorAwareness) < 201) &&
                     (strlen($Request->Experience) < 201);
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

