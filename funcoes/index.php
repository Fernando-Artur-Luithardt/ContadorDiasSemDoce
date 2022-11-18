<?php
require_once 'banco.php';

    
    function diasSem(){

        $sql = "SELECT dias, id  FROM diassemdoce order by id desc limit 1";
    
        $rowset = mysqli_query($conn, $sql);
    
        return $rowset;
    }
?>