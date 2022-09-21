<?php
    
    include '../setting/Connection.php';
    include '../CRUD/CRUD.php';

    /*=============================================================================
    =DECLARAR VARIABLES Y ASIGNARLES LOS DATOS TRAIDOS DEL FORMULARIO POR EL POST
    ===============================================================================*/
    
    $id       = $_POST['idUsuario'];
    $name     = $_POST["name"];
    $role     = $_POST["role"];
    $email    = $_POST["email"];
    $phone    = $_POST["phone"];
    $addres   = $_POST["addres"];
    $cedula   = $_POST["cedula"];
    $password = $_POST["password"];

    /*==================================================================================
    =DECLARAR VARIABLES E INSTANCIAR LA CLASE CRUD PARA ACTUALIZAR LOS DATOS DEL USUARIO
    ====================================================================================*/

    $field1  = "UsuIdUsuario";
    $field2  = "UsuNombre";
    $field3  = "UsuCorreoElectronico";
    $field4  = "UsuDireccion";
    $field5  = "UsuTelefono";
    $field6  = "RolId";
    $field7  = "UsuCedula";
    $field8  = "UsuClave";
    $tabledb = "tblusuario";
   
    $fields  = "$field2='$name', $field3='$email', $field4='$addres', $field5=$phone, $field6=$role, $field7=$cedula, $field8=$password";
    
    $user       = new CRUD();
    $resultUser = $user->Update($tabledb, $fields, $field1, $id);
      
    if ($resultUser){
   
        header ('location:ReadUsers.php') ;

    }else{

        echo "No se pudo hacer el cambio";

    }

?>


