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
        include 'DbConnect.php';

        $db = new DbConnect();

        $this->con = $db->connect();
    }

    //    Create User
    public function createUser($username, $password, $email)
    {

        if ($this->isUserExits($username, $email)) {
            return 0;
        } else {
            $password = md5($password);
            $sql = "INSERT INTO user(username,password,email)VALUES (?,?,?)";
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param("sss", $username, $password, $email);

            if ($stmt->execute()) {

                return 1;
            } else {
                return 2;
            }

        }

    }

//    UserLogin function
    public function userLogin($username, $password)
    {

        $password = md5($password);
        $sql = "SELECT id FROM user WHERE username = ? AND password = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows > 0;
    }

//    Fetch All Data

    public function getUserByUsername($username)
    {
        $sql = "SELECT * FROM user WHERE username = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    private function isUserExits($username, $email)
    {
        $sql = "SELECT id FROM user WHERE username = ? OR email = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows > 0;
    }


}