<?php
namespace Database;

abstract class InterfaceStaticPdo
{
    const DB_HOST = 'localhost';
    
    const DB_NAME = 'SignUp';
    
    const DB_USER = 'root';
    
    const DB_PWD = 'scutwuxie';
    
    protected static $PDO;
    
    //返回到 PDO 的一个实例
}

