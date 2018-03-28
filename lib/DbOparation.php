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
        require_once dirname(__FILE__) . 'DbConnect.php';

        $db = new DbConnect();

        $this->con = $db->connect();
    }

    //    Create User
    function createUser($username, $password, $email)
    {
        $password = md5($password);
        $sql = "INSERT INTO user(username,password,email)VALUES (?,?,?)";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("sss", $username, $password, $email);

        if ($stmt->execute()) {

            return true;
        } else {
            return false;
        }


    }
}