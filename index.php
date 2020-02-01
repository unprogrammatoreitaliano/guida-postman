<?php

    //decodifica post -> json
    $_POST  = json_decode(file_get_contents("php://input"), true);

    //inclusione files
    include('model.php');
    include('controller.php');

    //gestione cors
    if($_SERVER["REQUEST_METHOD"] == "OPTIONS")
    {
    if (isset($_SERVER["HTTP_ACCESS_CONTROL_REQUEST_METHOD"]))
        header("Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT"); 

    if (isset($_SERVER["HTTP_ACCESS_CONTROL_REQUEST_HEADERS"]))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
    }

?>