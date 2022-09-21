<?php 
    
    /* include '../template/headAdmin.php'; */
    include '../setting/Connection.php';
    include '../CRUD/CRUD.php';
    include '../Funciones/funcion.php';
     
    /*=============================================================================
    =DECLARAR VARIABLES E INSTANCIAR LA CLASE CRUD PARA TRAER LOS DATOS DEL USUARIO
    ===============================================================================*/

    $id      = $_GET['codigo'];
    $field   = "UsuIdUsuario";
    $tabledb = "tblusuario";
    
    $user       = new CRUD();
    $resultUsers = $user->ReadUpdate($tabledb, $field, $id);

    /*============================================================================
    =DECLARAR VARIABLES Y LLAMAR FUNCIONES AUXILIARES PARA TRAER LOS DATOS DEL ROL
    ===============================================================================*/

    $idRol    = $resultUsers['RolId'];
    $field1   = "RolId";
    $tabledb1 = "tblrol";

    $resultRole = $user->ReadUpdate($tabledb1, $field1, $idRol);
    $resultRole2 = $user->Read($tabledb1, $field1);

?>

<!-- ========================
=INICIA FORMULARIO DE UPDATE
=========================== -->

<div class="container">
    <form action="UpdateUsers.php" method="post" id="formCreate">
        <div class="form-group row">
            <div class="col-md-4">
                <input type="hidden" name="idUsuario" value="<?php echo $resultUsers['UsuIdUsuario']; ?>" >
                <label><b>Cedula</b></label><input type="text" class="form-control" name="cedula" value="<?php echo $resultUsers['UsuCedula']; ?>">
            </div>
            <div class="col-md-4">
                <label><b>Nombres y Apellidos</b></label>
                <input type="text" class="form-control" name="name" value="<?php echo $resultUsers['UsuNombre']; ?>">
            </div>
            <div class="col-md-4">
                <label><b>Email</b></label>
                <input type="email" class="form-control" name="email" value="<?php echo $resultUsers['UsuCorreoElectronico']; ?>">
            </div>
        </div><br>
        <div class="form-group row">
            <div class="col-md-4">
                <label><b>Celular</b></label>
                <input type="number" class="form-control" name="phone" value="<?php echo $resultUsers['UsuTelefono']; ?>">
            </div>
            <div class="col-md-4">
                <label><b>Direccion</b></label>
                <input type="text" class="form-control" name="addres" value="<?php echo $resultUsers['UsuDireccion']; ?>">
            </div>
            <div class="col-md-4">
                <label><b>Rol</b></label>
                <select name="role" class="form-control">
                    <?php  
                        if( $resultUsers['RolId'] > 0 ){

                            echo '<option value="'.$resultRole['RolId'].'">'.$resultRole['RolDescripcion'].'</option>';
                            
                            while( $search = mysqli_fetch_array($resultRole2) ){

                                echo '<option value="'.$search['RolId'].'">'.$search['RolDescripcion'].'</option>';
                            };

                        }
                    ?>
                </select>
            </div>
        </div><br>
        <div class="form-group row">
            <div class="col-md-4">
                <label><b>Contraseña</b></label>
                <input type="password" class="form-control" name="password" value="<?php echo $resultUsers['UsuClave']; ?>">
            </div>
            <div class="col-md-4">
                <label><b>Confirmar Contrasena</b></label>
                <input type="password" class="form-control" name="repeatPassword" placeholder="confirmar contrasena">
            </div> 
        </div><br>
        <button type="submit" value="Enviar" class="btn btn-warning m-2"><b>Actualizar Datos</b></button>
    </form>
</div>
 
<!-- =================================================
=FINALIZA FORMULARIO Y INICIA SCRIPT PARA LAS ALERTAS
==================================================== --> 

<script>
    $('#formCreate').submit(function(e){
        e.preventDefault();
   
        swal("Listo!", "Usuario Actualizado con Exito!", "success")
        .then((value) => {
            this.submit();
        }) 
    });
</script> 
<?php //include '../template/footer.php'; ?>