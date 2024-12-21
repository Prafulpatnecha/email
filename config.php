<?php

class Config
{

    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $datatype = "demo";
    private $connection;

    public function connect()
    {
        $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->datatype);
    }

    public function __construct()
    {
        $this->connect();
    }

    public function insertToIdEmail($email, $address, $contact, $isBlock, $isUpdate, $userName, $profileImage,)
    {
        $quary = "INSERT INTO `email`(`email`, `address`, `contact`, `isBlock`, `isUpdate`, `userName`, `profileImage`) VALUES ('$email','$address','$contact','$isBlock','$isUpdate','$userName','$profileImage')";
        $res = mysqli_query($this->connection, $quary);
        return $res;
    }

    public function deleteToIdEmail($email)
    {
        $quary = "DELETE FROM `email` WHERE email=$email";
        $res = mysqli_query($this->connection, $quary);
        return $res;
    }

    public function updateToIdEmail($email, $address, $contact, $isBlock, $isUpdate, $userName)
    {
        $quary = "UPDATE `email` SET `address`='$address',`contact`='$contact',`isBlock`='$isBlock',`isUpdate`='$isUpdate',`userName`='$userName' WHERE email = '$email'";
        $res = mysqli_query($this->connection, $quary);
        return $res;
    }
    public function updateProfileToIdEmail($email,$profileImage,)
    {
        $quary = "UPDATE `email` SET `profileImage`='$profileImage' WHERE email = '$email'";
        $res = mysqli_query($this->connection, $quary);
        return $res;
    }

    public function readToIdEmailOnly($email)
    {
        $quary = "SELECT * FROM `email` WHERE email=$email";
        $res = mysqli_query($this->connection, $quary);
        return $res;
    }

    public function readToIdEmail($email)
    {
        $quary = "SELECT * FROM `email` WHERE email=?";
        $res = $this->connection->prepare($quary);
        $res->bind_param("s", $email);
        $res->execute();
        return $res->get_result();
    }
}
