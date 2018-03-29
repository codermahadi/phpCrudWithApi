<?php

$response = array();
require_once '../lib/DbOparation.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['username']) and isset($_POST['password']) and isset($_POST['email'])) {

        $db = new DbOparation();
        $result = $db->createUser($_POST['username'],$_POST['password'],$_POST['email']);

        if ($result == 1){
            $response['error'] = false;
            $response['msg'] = "User Registered Successfully";

        }else if ($result == 2){
            $response['error'] = true;
            $response['msg'] = "Some Error Occurred please try again";

        }else if ($result == 0){
            $response['error'] = true;
            $response['msg'] = "User Already Exists";
        }

    } else {
        $response['error'] = true;
        $response['msg'] = "Required Fields are missing";
    }
} else {

    $response['error'] = true;
    $response['msg'] = "Invalid Request";

}

echo json_encode($response);