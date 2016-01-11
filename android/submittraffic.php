<?php
    $mobile = $_GET["mobile"];
    $ip = $_GET["ip"];
    $tut = $_GET["tut"];
    
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= '/includes/mysqlconfig.php';
    include($path);
        
    $conn = new mysqli(constant("HOST"), constant("USER"), constant("PASSWORD"),        constant("DATABASE"));
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        echo "shit";
    }
    
    $mobile = mysqli_real_escape_string($conn, $mobile);
    $ip = mysqli_real_escape_string($conn, $ip);
    $tut = mysqli_real_escape_string($conn, $tut);

    $query = $conn->query("INSERT INTO tutorials (datetime, device, ip, tut)
    VALUES(NOW(), '" . $mobile . "', '" . $ip . "', '" . $tut . "')");
    if($query){
        echo "recorded";
    }else{
        echo "shit";
    }
?>