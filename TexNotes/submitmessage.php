<?php
    $message = $_GET["message"];
    
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= '/includes/mysqlconfig.php';
    include($path);
        
    $conn = new mysqli(constant("HOST"), constant("USER"), constant("PASSWORD"),        constant("DATABASE"));
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        echo "shit";
    }
    
    $message = mysqli_real_escape_string($conn, $message);

    $query = $conn->query("INSERT INTO messages (datetime, message)
    VALUES(NOW(), '" . $message . "')");
    if($query){
        echo "recorded";
    }else{
        echo "shit";
    }
?>