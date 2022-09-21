<?php 
    include '../template/headAdmin.php'; 
    include '../setting/setting.php';
    include '../CRUD/CRUD.php';
    include '../setting/Connection.php';
    
    /*============================================================================================
    =DECLARAR VARIABLES E INSTANCIAR LA CLASE CRUD PARA TRAER LOS DATOS DEL USUARIO DE DOS TABLAS
    ==============================================================================================*/
    $x         = 0;
    $a         = "p";
    $b         = "u";
    $c         = "pr";
    $d         = "pe";
    $field     = "UsuIdUsuario";
    $field1    = "PedEstado";
    $field2    = "ProId";
    $field3    = "PedId";
    $tabledb   = "tblpedido";
    $tabledb1  = "tblusuario";
    $tabledb2  = "tblproductopedido";
    $tabledb3  = "tblproducto";
    $PedEstado = 1;
    $total     = 0;
    
    $IdPedCurrent = $_GET['codigo'];

    $WHERE = "WHERE $a.$field3=$IdPedCurrent";

    $orders       = new CRUD();
    $resultOrders = $orders->ReadJoin($tabledb, $tabledb1, $a, $b, $field, $field3, $eparator="", $showPage="", $WHERE);

    $search = mysqli_fetch_array($resultOrders) 
    
?>
<!-- =================================
=INICIA TABLA PARA LISTAR LOS USUARIOS
==================================== -->
<div class="table-responsive">
    <div class="card-header">
        <h3>Pedidos<h3>
    </div>
    <table class="table">
    <div class="card-header">
        <h3>Cliente &nbsp; &nbsp;<?php echo $search['UsuNombre']; ?>&nbsp; &nbsp;
            <a href="CreateSales.php?codigo=<?php echo $IdPedCurrent ?>" class="btn btn-primary m-2">
                Vender
            </a> 
            <a href="CancelOrders.php?codigo=<?php echo $IdPedCurrent; ?>" class="btn btn-danger m-2">
                Anular
            </a>   
        <h3>
    </div>
    <thead class="thead-dark">
        <tr>
            <th class="text-center" scope="col">#</th>
            <th class="text-center" scope="col">Productos</th>
            <th class="text-center" scope="col">Cantidad</th>
            <th class="text-center" scope="col">Valor Unitario</th>
            <th class="text-center" scope="col">Valor Total</th>
        </tr>
    </thead>
    <?php

        $user = $search['UsuIdUsuario'];
        $orders = ReadJoinAux($tabledb, $tabledb2, $tabledb3, $field, $field2, $field3, $a, $c, $d, $user, $IdPedCurrent);

        while( $order = mysqli_fetch_array($orders) ){ 
            $price  = $order['ProPrecio'];
            $amount = $order['PrCantidad'];
            $value  = $amount*$price;
            $total += $value;

    ?>
        <tbody>
            <tr>
                <td class="text-center"><?php $x+= 1; echo $x; ?> </td>
                <td class="text-center"><?php echo $order['ProNombre']; ?> </td>
                <td class="text-center"><?php echo $amount ?></td>
                <td class="text-center"><?php echo moneda." " .number_format($price,0,'.',','); ?></td>
                <td class="text-center"><?php echo moneda." " .number_format($value,0,'.',','); ?></td>
            </tr>
        
            <?php } ?>
            <tr>
                <td colspan="4"></td>
                <td colspan="3">
                    <p class="h4 text-center"><?php echo moneda." " .number_format($total,0,'.',','); ?></p>
                </td>
            </tr>
        </tbody>
    </table>
</div>


<!-- =================================================
=FINALIZA LA TABLA Y INICIA SCRIPT PARA LAS ALERTAS
==================================================== --> 

<script>
    function mostrar(x){
   
        swal({
            title: "¿Estas Seguro?",
            text: "Una vez eliminado no se puede acceder a la informacion",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {

                swal("Listo!", "Usuario Eliminado con Exito!", "success")
                .then((value) => {
                    window.location.replace('DeleteUsers.php?codigo='+x);
                }) 
            }
        });
    }
</script> 
<?php include '../template/footer.php'; ?>
  


