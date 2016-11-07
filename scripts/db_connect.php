<?php
        $db = new mysqli(
        "us-cdbr-azure-southcentral-f.cloudapp.net",
        "b335ab0322abab",
        "8765cd34",
        "database1606149"
        );
        if($db-> connect_errno){
        die('Connectfailed['.$db->connect_error.']');
        }       
?>