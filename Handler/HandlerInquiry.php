<?php
namespace Handler;
use StandardRequest\Request;
use Database;

class HandlerInquiry extends InterfaceHandler
{

    public function __construct ()
    {
        $this->handler = 'Inquiry';
    }

    public function handleRequest (Request $Request)
    {
        if ($Request->getHandler() == $this->handler) {
            $checkObj = array(
                    new \CheckData\CheckName($Request),
                    new \CheckData\CheckStdId($Request),
                    new \CheckData\CheckEnd($Request)
            );
            for ($i = 1; $i < count($checkObj); $i ++) {
                $checkObj[$i - 1]->setNext($checkObj[$i]);
            }
            if ($checkObj[0]->startCheck()) {
                $PDO = \Database\StaticPdo::DBConnect();
                $checkCookie = array(
                        new \CheckData\CheckCookie($Request),
                        new \CheckData\CheckEnd($Request)
                );
                $checkCookie[0]->setNext($checkCookie[1]);
                if (! $checkCookie[0]->startCheck()) {
                    $if_exist = \Database\DatabaseInfoExist::infoExist($PDO, 
                            'member', 
                            array(
                                    'Name' => $Request->Name,
                                    'StdId' => $Request->StdId
                            ));
                    if (! $if_exist) {
                        return json_encode(1);
                    }
                }
                $DBSelect = new \Database\DatabaseSelect('member', 
                        array(
                                'Name',
                                'StdId',
                                'Sex',
                                'QQNumber',
                                'PhoneNumber',
                                'Dormitory',
                                'ClassNumber',
                                'FirstChoice',
                                'SecondChoice'
                        ));
                $result = $DBSelect->setWhere(
                        array(
                                'Name' => "$Request->Name",
                                'StdId' => "$Request->StdId"
                        ))->startSelect($PDO);
                if (count($result)) {
                    return json_encode($result);
                }
            }
            return json_encode(1);
        } else {
            $this->successor->handleRequest($Request);
        }
    }
}

