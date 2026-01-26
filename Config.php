<?php

namespace Core;

abstract class Config
{
    protected function configAdm()
    {
        define('URL', 'https://localhost/setemerj/');
        define('URLADM', 'https://localhost/setemerj/adm/');

        define('CONTROLLER', 'Login');
        define('METODO', 'index');
        define('CONTROLLERERRO', 'Erro');
    } 
}