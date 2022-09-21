<?php 

    include '../template/headStart.php';
    include '../setting/Connection.php';    
    include '../CRUD/CRUD.php';

    /*=============================================================================
    =DECLARAR VARIABLES Y ASIGNARLES LOS DATOS TRAIDOS DEL FORMULARIO POR EL POST
    ===============================================================================*/

    $name           = $_POST['userName'];
    $email          = $_POST['userEmail'];
    $phone          = $_POST['userPhone'];
    $addres         = $_POST['userAddres'];
    $cedula         = $_POST['userCedula'];
    $password       = $_POST['userPassword'];

    //pregunto si existe la variable userRole por el metodo POST
    if(!empty($_POST['userRole'])){
        
        $role = $_POST['userRole'];
    }else{
        $role = 3;
        
    }

    /*==================================================================================
    =DECLARAR VARIABLES E INSTANCIAR LA CLASE CRUD PARA INSERTAR LOS DATOS DEL USUARIO
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

    $data   = "'$name' , '$email', '$addres', $phone, $role, $cedula, '$password'";
    $fields = "$field2, $field3, $field4, $field5, $field6, $field7, $field8";
    
    //instancio la clase CRUD
    $usu = new CRUD();
    
    //llamo al metodo create para hacer la insersion a la BD
    $classCRUD = $usu->Create($tabledb, $fields, $data);

