<?php
    include '../template/headAdmin.php'; 
    include '../setting/setting.php';
    include '../CRUD/CRUD.php';
    include '../setting/Connection.php';

?>
<div class="container">
    <div class="col">
        <div class="card-header">
            <h3>
                Informacion del Cliente
                <!-- Button trigger modal paara editar -->
                <button type="button" id="insert" class="btn btn-secondary" data-toggle="" data-target="#exampleModal">
                    Agregar
                </button> 
            <h3>
        </div>
        <div id="ShowMsg">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center" scope="col">Cedula</th>
                        <th class="text-center" scope="col">Nombre Completo</th>
                        <th class="text-center" scope="col">Direccion</th>
                        <th class="text-center" scope="col">Telefono</th>
                        <th class="text-center" scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center" >
                            <input type="text" class="form-control" id="customer" placeholder="Cedula" onchange="searchCustomer();">
                        </td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div></br>

 
<div class="container">
    <div class="col">
        <div class="card-header">
            <h3>
                Nueva Venta
            <h3>
        </div>
        <div id="ShowMsg2">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center" scope="col">ID</th>
                        <th class="text-center" scope="col">Descripcion</th>
                        <th class="text-center" scope="col">Stock</th>
                        <th class="text-center" scope="col">Cantidad</th>
                        <th class="text-center" scope="col">Valor Unitario</th>
                        <th class="text-center" scope="col">Valor Total</th>
                        <th class="text-center" scope="col">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center" >
                            <input type="text" class="form-control"  placeholder="Id" id="products" onchange="searchProducts();">
                        </td>
                        <td class="text-center"> </td>
                        <td class="text-center"> </td>
                        <td class="text-center">
                            <input type="number" class="form-control" placeholder="Cantidad" id="amount" onchange="searchProducts();">  
                        </td>
                        <td class="text-center"> </td>
                        <td class="text-center"> </td>
                        <td class="text-center">
                            <a href="#"  value="Enviar" class="btn btn-success m-2">Agregar</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div></br>
        
<div class="col">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th class="text-center" scope="col">#</th>
                <th class="text-center" scope="col">Descripcion</th>
                <th class="text-center" scope="col">Cantidad</th>
                <th class="text-center" scope="col">Valor Total</th>
            </tr>
        </thead>
        <?php // while(){  ?>
        <tbody>
            <tr>
                <td class="text-center"> </td>
                <td class="text-center"> </td>
                <td class="text-center"> </td>
                <td class="text-center"> </td>
            </tr>
        
            <?php  //  } ?>
            <tr>
                <td colspan="3"></td>
                <td colspan="3">
                    <p class="h4 text-center"> </p>
                </td>
            </tr>
        </tbody>
    </table>
</div> 
<!-- Modal agregar cliente-->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header btn btn-primary text-white">
                <h5 class="modal-title" id="exampleModalLongTitle">Nuevo Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">

                </div>
        </div>
    </div>
</div>          
            
<script>

    //modal para agregar rol
    $(document).on("click", "#insert", function(){

        $.ajax({
            
            url: "../Users/CreateUserCustomers.php"
            
        })
        .done(function(data){
            $("#add  .modal-body").html(data);  
        })
        .fail(function(){

            console.log('fallo');
        }); 
        $('#add').modal('toggle');

    });
	function searchCustomer(){ 

        var buscar = document.getElementById('customer').value;

        var parametros =  {
            "busqueda" : buscar,
            "accion" : 1
        };

        $.ajax({
            data: parametros,
            url: 'ReadCustomers.php',
            type: 'POST',
        
            beforesend: function()
            {
            $('#ShowMsg').html("Mensaje antes de Enviar");
            },

            success: function(mensaje)
            {
            $('#ShowMsg').html(mensaje);
            }
        });
    }

    function searchProducts(){ 

        var products = document.getElementById('products').value;
        var amount = document.getElementById('amount').value;

        var parametros =  {
            "busqueda" : products,
            "accion" : 2,
            "amount" : amount
        };

        $.ajax({
            data: parametros,
            url: 'ReadCustomers.php',
            type: 'POST',

            beforesend: function()
            {
            $('#ShowMsg2').html("Mensaje antes de Enviar");
            },

            success: function(mensaje)
            {
            $('#ShowMsg2').html(mensaje);
            }
        });
    }

</script>