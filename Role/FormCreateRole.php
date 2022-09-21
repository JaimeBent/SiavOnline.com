
<!-- ========================
=INICIA FORMULARIO DE CREATE
=========================== -->

<div class="container">
    <div class="form-group row"> 
        <form action="CreateRole.php" method="post" id="formCreate">
            <div class="col-md-7" >
                <label><b>Descripcion</b></label>
                <input type="text" class="form-control" name="DescripcionRol" placeholder="Escriba el Nombre del rol">
            </div><br>
            <button type="submit" value="Enviar" class="btn btn-primary m-2">Guardar Rol</button>
        </form>   
    </div>
</div>

<!-- ======================================================
=FINALIZA EL FORMULARIO E INICIA EL SCRIPT PARA LAS ALERTAS
========================================================= -->

<script>
    $('#formCreate').submit(function(e){
        e.preventDefault();
   
        swal("Listo!", "Rol Guardado con Exito!", "success")
        .then((value) => {
            this.submit();
        }) 
    });
</script> 

