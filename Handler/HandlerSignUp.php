<?php
namespace Handler;
use \Handler\InterfaceHandler as InterfaceHandler;
use \StandardRequest\Request as Request;

class HandlerSignUp extends InterfaceHandler
{

    public function __construct ()
    {
        $this->handler = 'SignUp';
    }

    public function handleRequest (Request $Request)
    {
        if ($this->handler == $Request->getHandler()) {
            $checkObj = array(
                    new \CheckData\CheckName($Request),
                    new \CheckData\CheckPhoneNumber($Request),
                    new \CheckData\CheckQQNumber($Request),
                    new \CheckData\CheckSex($Request),
                    new \CheckData\CheckDormitory($Request),
                    new \CheckData\CheckClassNumber($Request),
                    new \CheckData\CheckChoice($Request),
                    new \CheckData\CheckBirthday($Request),
                    new \CheckData\CheckEnd($Request)
            );
            for ($i = 0, $j = count($checkObj) - 1; $i < $j; $i ++) {
                $checkObj[$i]->setNext($checkObj[$i + 1]);
            }
            $check_result = $checkObj[0]->startCheck();
            if ($check_result) {
                $PDO = \Database\StaticPdo::DBConnect();
                $exist = \Database\DatabaseInfoExist::infoExist($PDO, 'member', 
                        array(
                                'StdId' => $Request->StdId
                        ));
                if ($exist) {
                    $DBInsert = new \Database\DatabaseInsert('member');
                    $result = $DBInsert->setColumn(
                            array(
                                    'StdId' => $Request->StdId,
                                    'Sex' => $Request->Sex,
                                    'Name' => $Request->Name,
                                    'Birthday' => $Request->Birthday,
                                    'PhoneNumber' => $Request->PhoneNumber,
                                    'Dormitory' => $Request->Dormitory,
                                    'ClassNumber' => $Request->ClassNumber,
                                    'FirstChoice' => $Request->FirstChoice,
                                    'SecondChoice' => $Request->SecondChoice
                            ))
                        ->setValue()
                        ->startInsert($PDO);
                    if ($result) {
                        setcookie(md5($Request->Name), md5($Request->StdId), 
                                time() + 60 * 60 * 24 * 7);
                        return json_encode(0);
                    }
                }
            }
        } else {
            $this->successor->handleRequest($Request);
        }
    }
}

