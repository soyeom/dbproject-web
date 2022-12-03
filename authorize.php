<?php
    session_start();
    if(isset($_SESSION['id'])){
        $login = TRUE;
    }
    else{
        $login = FALSE;
    }
?>