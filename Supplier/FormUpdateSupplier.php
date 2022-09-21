<?php 
    include '../setting/Connection.php';
    include '../CRUD/CRUD.php';

    /*================================================================================
    =DECLARAR VARIABLES E INSTANCIAR LA CLASE CRUD PARA TRAER LOS DATOS DE PROVEEDORES
    ==================================================================================*/

    $id      = $_GET['codigo'];
    $field   = "PrvId";
    $tabledb = "tblProveedor";
        
    $suppliers       = new CRUD();
    $resultSuppliers = $suppliers->ReadUpdate($tabledb, $field, $id);

?>

<!-- ========================
=INICIA FORMULARIO DE UPDATE
=========================== -->

<div class="container">        
    <form action="UpdateSupplier.php" method='post' id="formCreate">
        <div class="form-group row">
            <div class="col-md-4">
                <input type="hidden" name="idProveedor" value="<?php echo $resultSuppliers['PrvId']; ?>" >
                    <label><b>Nit</b></label>
                    <input type="text" class="form-control" name="Nit" value="<?php echo $resultSuppliers['PrvNit']; ?>" >
                </div>
                <div class="col-md-4">
                    <label><b>Nombre</b></label>
                    <input type="text" class="form-control" name="name" value="<?php echo $resultSuppliers['PrvNombre']; ?>">
                </div>
                <div class="col-md-4">
                    <label><b>Direccion</b></label>
                    <input type="text" class="form-control" name="addres" value="<?php echo $resultSuppliers['PrvDireccion']; ?>">
                </div>
            </div><br>
            <div class="form-group row">
                <div class="col-md-4">
                    <label><b>Telefono</b></label>
                    <input type="number" class="form-control" name="phone" value="<?php echo $resultSuppliers['PrvTelefono']; ?>">
                </div>
                <div class="col-md-4">
                    <label><b>Razon Social</b></label>
                    <input type="text" class="form-control" name="RazonSocial" value="<?php echo $resultSuppliers['PrvRazonSocial']; ?>">
                </div>
            </div>
            <button type="submit" value="Enviar" class="btn btn-warning m-2"><b>Actualizar</b></button>
        </form>
    </div>
</div>    

<!-- ===============================================
=FINALIZA TABLA E INICIA EL SCRIPT PARA LAS ALERTAS
================================================== -->

<script>
    $('#formCreate').submit(function(e){
        e.preventDefault();
   
        swal("Listo!", "Proveedor Actualizado con Exito!", "success")
        .then((value) => {
            this.submit();
        }) 
    });
</script> 

