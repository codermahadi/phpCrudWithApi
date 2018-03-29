<?php

$response = array();
require_once '../lib/DbOparation.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['username']) AND isset($_POST['password'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];

        $db = new DbOparation();
        $db->logging($username);

        if ($db->userLogin($username, $password)) {

            $user = $db->getUserByUsername($username);
            $response['error'] = false;
            $response['id'] = $user['id'];
            $response['email'] = $user['email'];
            $response['username'] = $user['username'];
        } else {

            $response['error'] = true;
            $response['msg'] = "Invalid Username Or Password !";
        }

    } else {
        $response['error'] = true;
        $response['msg'] = "Required Fields are missing";
    }

    echo json_encode($response);

}