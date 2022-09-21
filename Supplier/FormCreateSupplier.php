<?php include '../template/headAdmin.php' ?>

<!-- ========================
=INICIA FORMULARIO DE CREATE
=========================== -->

<div class="container">
    <div class="card d-flex justify-content-around flex-wrap">
        <div class="card-header">
            <h3>Registrar Proveedor<h3>
        </div>
        <form action="CreateSupplier.php" method='post' id="formCreate">
            <div class="d-flex w-auto p-3">
                <div class="d-inline w-100 p-3">
                    <input type="text" class="form-control" name="Nit" placeholder="NIT">
                    <label>Nit</label>
                </div>
                <div class="d-inline w-100 p-3">
                    <input type="text" class="form-control" name="name" placeholder="Nombre">
                    <label>Nombre</label>
                </div>
                <div class="d-inline w-100 p-3">
                    <input type="text" class="form-control" name="addres" placeholder="Direccion">
                    <label>Direccion</label>
                </div>
                <div class="d-inline w-100 p-3">
                    <input type="number" class="form-control" name="phone" placeholder="Telefono">
                    <label>Telefono</label>
                </div>
                <div class="d-inline w-100 p-3">
                    <input type="text" class="form-control" name="RazonSocial" placeholder="Razon Social">
                    <label>Razon Social</label>
                </div>
            </div>
            <button type="submit" value="Enviar" class="btn btn-primary m-2">Guardar</button>
        </form>
    </div>
</div>

<!-- ===============================================
=FINALIZA TABLA E INICIA EL SCRIPT PARA LAS ALERTAS
================================================== -->

<script>
    $('#formCreate').submit(function(e){
        e.preventDefault();
   
        swal("Listo!", "Proveedor Guardado con Exito!", "success")
        .then((value) => {
            this.submit();
        }) 
    });
</script> 
<?php include '../template/footer.php'; ?>    
        
