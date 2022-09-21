<?php       
                                    
    include '../setting/Connection.php';
    include '../CRUD/CRUD.php';
?>
<div class="card d-flex" >
    <div class="card-header">
        <h5>Digite su informacion para envio<h5>
    </div>
    <div class="card-body" >
            <div class = "form-group m-0 p-2">
                <label>Direccion</label>
                <input type="text" class="form-control" name="" placeholder="Escribe su direccion actual">
            </div>
            <div class="form-group p-2">
                <label>Departamento</label>
                <select name="Departamento" id="Departamento" class="form-control" onchange="searchCiudad();">
                    <option value="0" >Seleccione</option>
                    <?php       
                    
                        $field   = "DepId";
                        $tabledb = "tbldepartamento";

                        $dep      = new CRUD();
                        $resultDep = $dep->Read($tabledb, $field);
                        
                        while( $search = mysqli_fetch_array($resultDep) ){

                            echo '<option value="'.$search['DepId'].'">'.$search['DepNombre'].'</option>';

                        }
                            
                    ?>
                </select>
            </div>
            <div class="form-group p-2" id="ciudad">
            <label>Ciudad</label>
            <select name="role" class="form-control" >
                <option value="0">Seleccione</option>
                             
            </div>
                <a href="ReadyOrders.php" type="submit" value="Enviar"  name="btn1" class="btn btn-success m-2">Pagar</a>
    </div>
</div> 
<script>
    function searchCiudad(){ 

        var buscar = document.getElementById('Departamento').value;

        var parametros =  {
            "busqueda" : buscar,
        };

        $.ajax({
            data: parametros,
            url: 'ReadCiudad.php',
            type: 'POST',

            beforesend: function()
            {
            $('#ciudad').html("Mensaje antes de Enviar");
            },

            success: function(mensaje)
            {
            $('#ciudad').html(mensaje);
            }
        });
    }
</script>