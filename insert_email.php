<?php

header("Assess-Control-Allow-Method:POST");
header("Content-Type: application/json");

include("config.php");

$c1 = new Config();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST["email"];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $isBlock = $_POST['isBlock'];
    $isUpdate = $_POST['isUpdate'];
    $userName = $_POST['userName'];
    $profileImage = $_POST['profileImage'];

    $res = $c1->insertToIdEmail($email, $address, $contact, $isBlock, $isUpdate, $userName, $profileImage);

    if($res)
    {
        $arr['msg'] = "Data inserted successfully";
    }else{
        $arr['err'] = "error";
    }
} else {
    $arr['err'] = "Post method not found";
}

echo json_encode($arr);
?>