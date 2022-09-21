<?php

    include '../template/headCustomer.php';
    include '../setting/Connection.php';
    include '../setting/setting.php';
    include '../CRUD/CRUD.php';
    
    $x       = 0;
    $total   = 0;
    $field   = "ProId";
    $tabledb = "tblproducto";
    
    if(!empty($_POST)){

        $id     = $_POST['id'];
        $amount = $_POST['newAmount'];
    
        $pro       = new CRUD();
        $classCRUD = $pro->ReadUpdate($tabledb, $field, $id);
    
        if(isset($_SESSION['cart'][$id])){
    
            if($amount > $classCRUD['ProCantidad']){ ?>

            <script>
    
                swal("Error", "Cantidad supera el stock!", "warning")
                .then((value) => {
                    window.location.replace('../Customers/ReadCartProducts.php');
                }) 
            </script> 
            <?php
            
            }else{
                unset($_SESSION['cart'][$id]);
                $_SESSION['cart'][$id]=$amount; ?>
        
                <script>
                
                    swal("Listo!", "Cantidad Actualizada con Exito!", "success")
                    .then((value) => {
                        window.location.replace('../Customers/ReadCartProducts.php');
                    }) 

                </script>
                <?php
        
            }
            
        }

    }else{

        if(isset($_SESSION['cart'])){


?>
<!-- =============================================
=INICIA TABLA PARA LISTAR LOS PRODUCTOS DEL CARRITO
================================================ -->

<div class="container">

<div class="table"> 
    <div class="card-header"><h3>Carrito<h3></div>
        <table class="table w-75">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center" scope="col">#</th>
                    <th class="text-center" scope="col">Productos</th>
                    <th class="text-center" scope="col">Descripcion</th>
                    <th class="text-center" scope="col">Cantidad</th>
                    <th class="text-center" scope="col">Valor Unitario</th>
                    <th class="text-center" scope="col">Valor Total</th>
                    <th class="text-center" scope="col">Accion</th>

                </tr>
            </thead>
            <?php 
                foreach($_SESSION['cart'] as $id => $amount){

                    $pro       = new CRUD();
                    $classCRUD = $pro->ReadUpdate($tabledb, $field, $id);
                                        
                    $name   = $classCRUD['ProNombre'];
                    $price  = $classCRUD['ProPrecio'];
                    $value  = $price * $amount;
                    $total += $value;
                    
                ?>
                <tbody>
                    <tr>
                        <form action="ReadCartProducts.php" method="POST" id="formAmount">
                            <td class="text-center"><?php echo $x += 1;?></td>
                            <td class="text-center"><?php echo $name ?> </td>
                            <td class="text-center"><?php echo $classCRUD['ProDescripcion']; ?> </td>
                            <td class="text-center">
                            <input type="hidden" name="id"  value="<?php echo $id ?>" size="5">
                            <input type="number" name="newAmount" min="1" max="<?php echo $search['ProCantidad']?>" step="1" value="<?php echo $amount ?>" size="5" onchange="editar();">
                            </td>
                            <td class="text-center"><?php echo moneda." " .number_format($price,0,'.',','); ?> </td>
                            <td class="text-center"><?php echo moneda." " .number_format($value,0,'.',','); ?> </td>
                            <td class="text-center">
                                <a  class="btn btn-danger m-2" onclick="eliminar(<?php echo $id; ?>)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                </a>
                            </td>
                        </form>
                    </tr>
                
                    <?php   
                            }

                        }
                    
                    ?>
                <tr>
                    <td colspan="4"></td>
                    <td colspan="1"></td>
                    <td colspan="1">
                        <p class="h4 text-center"><?php echo moneda." " .number_format($total,0,'.',','); ?></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="col-md-2 offset-md-7 d-grid gap-2">
            <a href="vaciarCart.php" class="btn btn-warning">
                Vaciar Carrito
            </a>
            <button id="botones" class="btn btn-primary">
                hacer Pedido
            </button>
        </div>
    </div>
        <div class="row d-flex">
            <div id="PayCart" class="col-5">
             
            </div>
            
            <div id="hola" class="col-5">
                
            </div>
                
        </div>
        
    </div>
    <?php
}
?>

<!-- =================================================
=FINALIZA LA TABLA Y INICIA SCRIPT PARA LAS ALERTAS
==================================================== --> 

<script>
   
    $('#botones').click(function show(){
            
        //vaciar el div en RedCart.php de Metodos de pago
        //$("#PayCart").html('')
            
            $.ajax({
                
                url: "PaymentMethods.php"
                
            })
            .done(function(data){
                $("#PayCart").html(data);  
            })
            .fail(function(){

                console.log('fallo');
            }); 
       

    });

    function hola(){
        $.ajax({
            url: "dataCustomers.php",

            success: function(mensaje)
            {
            $('#hola').html(mensaje);
            }
        });
          
           
    
        };

    function eliminar(x){
   
        swal({
            title: "¿Estas Seguro?",
            text: "Una vez eliminado no se puede acceder a la informacion",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {

                swal("Listo!", "Producto Eliminado con Exito!", "success")
                .then((value) => {
                    window.location.replace('DeleteCartProducts.php?codigo='+x);
                }) 
            }
        });
    }
	
</script> 
    <?php  include '../template/footer.php';  ?>
</div> 