<?php

class DbConnect
{

    private $con;

    function __construct()
    {
    }

    public function connect()
    {

        include 'config.php';

        $this->con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if (mysqli_connect_errno()) {
            echo "Failed Connect with database";
        }

        return $this->con;
    }
}

?>