<?php
    session_start();


    include '../setting/Connection.php';
    include '../setting/setting.php';
    include '../CRUD/CRUD.php';
    
    $field   = "ProId";
    $tabledb = "tblproducto";

    $id     = $_POST['id'];
    $amount = $_POST['newAmount'];

    $pro       = new CRUD();
    $classCRUD = $pro->ReadUpdate($tabledb, $field, $id);

    if(isset($_SESSION['cart'][$id])){

        if($amount > $classCRUD['ProCantidad']){

            header('location: ../Customers/ReadCartProducts.php?mensaje="La Cantidad Supera el Stop"');
        
        }else{
            unset($_SESSION['cart'][$id]);
            $_SESSION['cart'][$id]=$amount;
    
    
            header('location: ../Customers/ReadCartProducts.php');
    
        }
        
    }

  
?>
