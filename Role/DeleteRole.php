<?php
    
    include '../setting/Connection.php';
    include '../CRUD/CRUD.php';

    /*=====================================================================
    =DECLARAR VARIABLES E INSTANCIAR LA CLASE CRUD PARA ELIMINAR LOS ROLES
    =======================================================================*/
    
    $id      = $_GET['codigo'];
    $field   = "RolId";
    $tabledb = "tblrol";
       
    $role      = new CRUD();
    $classCRUD = $role->Delete($tabledb, $field, $id);

    if ($classCRUD){
    
        header ('location:ReadRole.php');
    
    } else {
        echo 'error al eliminar';
    }

?>