<?php

    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $database = 'ql_nhansu';

    $conn = new mysqLi($server, $user, $pass, $database);

    if($conn){
        mysqli_query($conn, "SET NAMES 'utf8'");
        
    }
    else
    {
        echo 'Kết nối với Database không thành công !';
    }

?>