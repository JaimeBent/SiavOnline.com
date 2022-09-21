<?php
    
    include '../setting/Connection.php';
    include '../CRUD/CRUD.php';

    /*=============================================================================
    =DECLARAR VARIABLES Y ASIGNARLES LOS DATOS TRAIDOS DEL FORMULARIO POR EL POST
    ===============================================================================*/

    $id   = $_POST['idRol'];
    $name = $_POST["DescripcionRol"];

    /*=======================================================================
    =DECLARAR VARIABLES E INSTANCIAR LA CLASE CRUD PARA ACTUALIZAR LOS ROLES
    =========================================================================*/

    $field1  = "RolId";
    $field2  = "RolDescripcion";
    $tabledb = "tblrol";
    
    $fields = "$field2='$name'";

    $role      = new CRUD();
    $classCRUD = $role->Update($tabledb, $fields, $field1, $id);
    
    
    if($classCRUD){

        header ('location:ReadRole.php');
        
    }else{

        echo "No se pudo hacer el cambio";

    }

    

?>


