<?php
    session_start();
    if($_SESSION['user']){
        session_destroy();
        header("location: /Sitioweb/Sitioweb/views/privado/Index.php");
    }
    else{
        header("location: /Sitioweb/Sitioweb/views/privado/Index.php");
    }
?>