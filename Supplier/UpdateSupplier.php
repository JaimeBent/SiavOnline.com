<?php

    include '../setting/Connection.php';    
    include '../CRUD/CRUD.php';

    /*=============================================================================
    =DECLARAR VARIABLES Y ASIGNARLES LOS DATOS TRAIDOS DEL FORMULARIO POR EL POST
    ===============================================================================*/
    
    $id     = $_POST["idProveedor"];
    $Nit    = $_POST["Nit"];
    $name   = $_POST["name"];
    $phone  = $_POST["phone"];
    $Razon  = $_POST["RazonSocial"];
    $addres = $_POST["addres"];
    
    /*=============================================================================
    =DECLARAR VARIABLES E INSTANCIAR LA CLASE CRUD PARA ACTUALIZAR LOS PROVEEDORES
    ===============================================================================*/

    $field1  = "PrvId";
    $field2  = "PrvNit";
    $field3  = "PrvNombre";
    $field4  = "PrvDireccion";
    $field5  = "PrvTelefono";
    $field6  = "PrvRazonSocial";
    $tabledb = "tblproveedor";
      
    $fields = "$field2='$Nit', $field3='$name', $field4='$addres', $field5=$phone, $field6='$Razon'";
    
    $suppliers       = new CRUD();
    $resultSuppliers = $suppliers->Update($tabledb, $fields, $field1, $id);
      
    if ($resultSuppliers){
        
        header ('location:../Supplier/ReadSupplier.php');
    
    } else {
        echo 'error de registro';
    }
