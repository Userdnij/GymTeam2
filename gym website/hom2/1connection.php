<?php

const DB_HOST= "localhost";
const DB_USER = "root";
const DB_PASSWORD = "";
const DB_NAME = "gymteam";

$servername = "localhost";
$database = "gymteam";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);
$dsn="mysql:host=$servername;dbname=$database";
$opt=[
    pdo::ATTR_ERRMODE=>pdo::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
];
$pdo=new PDO($dsn,$username,$password,$opt);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


