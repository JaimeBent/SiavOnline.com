<?php
    include '../setting/Connection.php';
    include '../CRUD/CRUD.php';

    /*=============================================================================
    =DECLARAR VARIABLES Y ASIGNARLES LOS DATOS TRAIDOS DEL FORMULARIO POR EL POST
    ===============================================================================*/
            
    $name = $_POST["DescripcionRol"];

    /*=======================================================================
    =DECLARAR VARIABLES E INSTANCIAR LA CLASE CRUD PARA REGISTRAR LOS ROLES
    =========================================================================*/

    $field   = "RolDescripcion";
    $tabledb = "tblrol";

    $data = "'$name'";

    $role      = new CRUD();
    $classCRUD = $role->Create($tabledb, $field, $data);
       
    if ($classCRUD){
            
        header ('location:ReadRole.php');
        
    } else {
        echo 'error de registro';
    }

    

?>