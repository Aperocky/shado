<?php
    // echo $_GET['filename'];
    $dir = sys_get_temp_dir() . "/" . uniqid();
    echo $dir;
    mkdir($dir);
?>
