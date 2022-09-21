<?php 

    include '../setting/Connection.php';
    include '../CRUD/CRUD.php';

    /*=============================================================================
    =DECLARAR VARIABLES Y ASIGNARLES LOS DATOS TRAIDOS DEL FORMULARIO POR EL POST
    ===============================================================================*/
    if(!empty($_POST)){

        $name     = $_POST["name"];
        $role     = $_POST["role"];
        $email    = $_POST["email"];
        $phone    = $_POST["phone"];
        $addres   = $_POST["addres"];
        $cedula   = $_POST["cedula"];
        $password = 1234;


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

    
            $data   = "'$name' , '$email', '$addres', $phone, $role, $cedula, $password";
            $fields = "$field2, $field3, $field4, $field5, $field6, $field7, $field8";
            
            $usu       = new CRUD();
            $classCRUD = $usu->Create($tabledb, $fields, $data);
            
            if ($classCRUD){ ?>

                    <script>
                    
                    swal("Listo!", "Usuario Guardado con Exito!", "success")
                    .then((value) => {
                        window.location.replace('../Sales/NewSales.php');
                    }) 
                    </script><?php

            } else {
                echo 'error de registro';
            }
        
    }else{  ?> <!-- termino codigo php para mostrar formulario inicial -->

        <div class="container">
            <form action="../Users/CreateUserCustomers.php" method='post' id="formCreate">
                <div class="form-group row">
                    <div class="col-md-4">
                        <input type="hidden" name="idUsuario">
                        <label><b>Cedula</b></label><input type="text" class="form-control" name="cedula" >
                    </div>
                    <div class="col-md-4">
                        <label><b>Nombres y Apellidos</b></label>
                        <input type="text" class="form-control" name="name" >
                    </div>
                    <div class="col-md-4">
                        <label><b>Email</b></label>
                        <input type="email" class="form-control" name="email">
                    </div>
                </div><br>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label><b>Celular</b></label>
                        <input type="number" class="form-control" name="phone">
                    </div>
                    <div class="col-md-4">
                        <label><b>Direccion</b></label>
                        <input type="text" class="form-control" name="addres" >
                    </div>
                    <div class="col-md-4">
                        <label><b>Rol</b></label>
                        <select name="role" class="form-control bg-secondary">
                            <option value="3">cliente</option>
                        </select>
                    </div>
                </div><br>
                <button type="submit" value="Enviar" name="btn1" class="btn btn-primary m-2">Guardar</button>  
            </form>
        </div>
        <?php   

}//termina condicional 

?>
