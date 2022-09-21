<?php

    include '../setting/Connection.php';
    include '../CRUD/CRUD.php';

    $id      = $_GET['codigo'];
    $field   = "ProId";
    $tabledb = "tblProducto";
       
    $pro       = new CRUD();
    $classCRUD = $pro->Delete($tabledb, $field, $id);

    if ($classCRUD){
        
        header ('location:ReadProducts.php');
    
    } else {
        echo 'error al eliminar';
    }

?>