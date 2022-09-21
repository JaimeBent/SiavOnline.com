<?php

    include '../setting/Connection.php';
    include '../CRUD/CRUD.php';

    /*================================================================================
    =DECLARAR VARIABLES E INSTANCIAR LA CLASE CRUD PARA ELIMINAR LOS DATOS DE PROVEEDORES
    ==================================================================================*/

    $id      = $_GET['codigo'];
    $field   = "PrvId";
    $tabledb = "tblProveedor";
       
    $sup       = new CRUD();
    $classCRUD = $sup->Delete($tabledb, $field, $id);

    if ($classCRUD){
        
        header ('location:ReadSupplier.php') ;
    
    } else {
        echo 'error al eliminar';
    }

?>