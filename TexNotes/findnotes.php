<?php
    $course = $_GET["course"];
    $month = $_GET["month"];

    $path = $course . "/" . $month;

    if(file_exists($path)){
        $fi = new FilesystemIterator($path, FilesystemIterator::SKIP_DOTS);
        if(iterator_count($fi) > 0){
            $files = scandir($path);
            $allNotes = "";
            for($i = 2; $i<count($files); $i++){
                $allNotes = $allNotes . $files[$i];
            }
            echo $allNotes;
        }else{
            echo "none";   
        }
    }else{
        echo "none";
    }
?>