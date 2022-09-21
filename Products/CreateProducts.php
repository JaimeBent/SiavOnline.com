<?php

    include '../setting/Connection.php';
    include '../CRUD/CRUD.php';

    $name        = $_POST["name"];
    $price       = $_POST["price"];
    $image       = addslashes(file_get_contents($_FILES['image']['tmp_name'])); 
    $amount      = $_POST["amount"];
    $active      = $_POST["active"];
    $supplier    = $_POST["supplier"];
    $description = $_POST["description"];
    
    $field1  = "ProId";
    $field2  = "ProNombre";
    $field3  = "ProDescripcion";
    $field4  = "ProCantidad";
    $field5  = "ProPrecio";
    $field6  = "PrvId";
    $field7  = "ProActivo";
    $field8  = "ProImagen";
    $tabledb = "tblproducto";

    $data   = "'$name', '$description', $amount, $price, $supplier , $active, '$image'";
    $fields = "$field2, $field3, $field4, $field5, $field6, $field7, $field8";
    
    $pro       = new CRUD();
    $classCRUD = $pro->Create($tabledb, $fields, $data);
      
    if ($classCRUD){
        
        header ('location:ReadProducts.php');
        echo 'producto registrado exitosamente';

    } else {
        include 'FormularioRegistrarProducto.php';
        echo 'error de registro';
    }
   
?>