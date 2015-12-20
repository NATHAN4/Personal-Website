<?php
    $path = $_GET["course"] . '/';
    
    $results = scandir($path);

    foreach ($results as $result) {
        if ($result === '.' or $result === '..') continue;

        if (is_dir($path . '/' . $result)) {
            echo $result . "!";
        }
    }
?>