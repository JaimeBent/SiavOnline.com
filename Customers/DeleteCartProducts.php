<?php
    session_start();

    $id = $_GET['codigo'];

    if(isset($_SESSION['cart'][$id])){

       unset($_SESSION['cart'][$id]);

    }else{

        header("location: ".$_SERVER['HTTP_REFERER']."");
    }

    header("location: ".$_SERVER['HTTP_REFERER']."");
  
?>
