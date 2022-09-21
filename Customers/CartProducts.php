<?php
    session_start();

    $id     = $_POST['codigo'];
    $amount = $_POST['amount'];
        
    if(isset($_SESSION['cart'][$id])){

       $_SESSION['cart'][$id]+=$amount;

    }else{

        $_SESSION['cart'][$id]=$amount;
    }

    header("location: ".$_SERVER['HTTP_REFERER']."");
  
?>



