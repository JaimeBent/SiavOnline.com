<?php
    session_start();

    if(isset($_SESSION['cart'])){

       unset($_SESSION['cart']);

    }else{

        header("location: ../Customers/ReadCartProducts.php");
    }

    header("location: ../Customers/ReadCartProducts.php");
  
?>