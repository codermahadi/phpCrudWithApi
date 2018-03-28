<?php

/**
 * Created by PhpStorm.
 * User: Mahadi
 * Date: 3/28/2018
 * Time: 11:22 AM
 */
class DbOparation
{

    private $con;
    function __construct()
    {
        require_once dirname(__FILE__).'DbConnect.php';

        $db = new DbConnect();

        $this->con = $db->connect();
    }
}