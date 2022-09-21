<?php 
    
    include '../setting/Connection.php';
    include '../CRUD/CRUD.php';
    
    $id      = $_GET['codigo'];
    $field   = "RolId";
    $tabledb = "tblRol";

    $role      = new CRUD();
    $classCRUD = $role->ReadUpdate($tabledb, $field, $id);

?>

<!-- ===========================
=INICIA EL FORMULARIO DE UPDATE
============================== -->

<div class="container">
<div class="form-group row">
        <form action="UpdateRole.php" method="post" id="formCreate">
            <div class="col-md-7" >
                <input type="hidden" name="idRol" value="<?php echo $classCRUD['RolId']; ?>" >
                <label><b>Descripcion</b></label>
                <input type="text" class="form-control" name="DescripcionRol" value="<?php echo $classCRUD['RolDescripcion']; ?>">
            </div><br>
            <button type="submit" value="Enviar" class="btn btn-warning m-2"><b>Actualizar Rol</b></button>
        </form>  
    </div>
</div>

<!-- ======================================================
=FINALIZA EL FORMULARIO E INICIA EL SCRIPT PARA LAS ALERTAS
========================================================= -->

<script>
    $('#formCreate').submit(function(e){
        e.preventDefault();
   
        swal("Listo!", "Rol Actualizado con Exito!", "success")
        .then((value) => {
            this.submit();
        }) 
    });
</script> 