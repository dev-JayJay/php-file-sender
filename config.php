<?php 

function connection() {
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $db_name = "dahas_project";

    $conn = new mysqli($serverName, $userName, $password, $db_name);

    if ($conn -> connect_error) {
        die("connection failed: " . $conn->connect_error) ;
    }
    return $conn;
    // $conn->close();
}

    if (!defined('BASE_URL')) {
        define('BASE_URL', 'http://localhost/PHP/daha-project/');
    }

?>