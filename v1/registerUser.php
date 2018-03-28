<?php

$response = array();
require_once '../lib/DbOparation.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['username']) and isset($_POST['password']) and isset($_POST['email'])) {

        $db = new DbOparation();
        $ins = $db->createUser($_POST['username'],$_POST['password'],$_POST['email']);

        if ($ins){

            $response['error'] = false;
            $response['msg'] = "User Registered Successfully";
        }else{
            $response['error'] = true;
            $response['msg'] = "Some Error Occurred please try again";
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