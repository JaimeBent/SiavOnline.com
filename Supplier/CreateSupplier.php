<?php

    include '../setting/Connection.php';
    include '../CRUD/CRUD.php';

    /*=============================================================================
    =DECLARAR VARIABLES Y ASIGNARLES LOS DATOS TRAIDOS DEL FORMULARIO POR EL POST
    ===============================================================================*/
    
    $Nit    = $_POST["Nit"];
    $name   = $_POST["name"];
    $phone  = $_POST["phone"];
    $Razon  = $_POST["RazonSocial"];
    $addres = $_POST["addres"];

    /*===================================================================================
    =DECLARAR VARIABLES E INSTANCIAR LA CLASE CRUD PARA INSERTAR LOS DATOS DE PROVEEDORES
    =====================================================================================*/
    
    $field1  = "PrvNit";
    $field2  = "PrvNombre";
    $field3  = "PrvDireccion";
    $field4  = "PrvTelefono";
    $field5  = "PrvRazonSocial";
    $tabledb = "tblproveedor";
    
    $data   = "$Nit, '$name' , '$addres', $phone, '$Razon'";
    $fields = "$field1, $field2, $field3, $field4, $field5";
    
    $sup       = new CRUD();
    $classCRUD = $sup->Create($tabledb, $fields, $data);
      
    if ($classCRUD){
        
        header ('location:../Supplier/ReadSupplier.php');
    
    } else {
        echo 'error de registro';
    }
