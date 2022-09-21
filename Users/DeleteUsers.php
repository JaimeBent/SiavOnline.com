<?php

    include '../setting/Connection.php';
    include '../CRUD/CRUD.php';

    /*==================================================================================
    =DECLARAR VARIABLES E INSTANCIAR LA CLASE CRUD PARA ELIMINAR LOS DATOS DEL USUARIO
    ====================================================================================*/
    
    $id      = $_GET['codigo'];
    $field   = "UsuIdUsuario";
    $tabledb = "tblusuario";
       
    $usu       = new CRUD();
    $classCRUD = $usu->Delete($tabledb, $field, $id);

    if ($classCRUD){
        
        header ('location:ReadUsers.php') ;
    
    } else {
        echo 'error al eliminar';
    }

?>