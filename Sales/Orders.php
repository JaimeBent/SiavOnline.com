<?php 
    include '../template/headAdmin.php'; 
    include '../setting/setting.php';
    include '../setting/Connection.php';
    include '../CRUD/CRUD.php';
    
    /*============================================================================================
    =DECLARAR VARIABLES E INSTANCIAR LA CLASE CRUD PARA TRAER LOS DATOS DEL USUARIO DE DOS TABLAS
    ==============================================================================================*/
    
    $x         = 0;
    $a         = "p";
    $b         = "u";
    $field     = "UsuIdUsuario";
    $field1    = "PedId";
    $field2    = "PedEstado";
    $tabledb   = "tblpedido";
    $tabledb1  = "tblusuario";
    $PedEstado = 1;
    
    /*Instancio la clase CRUD*/
    $orders = new CRUD();
        
    /*llamo al metodo ReadUpdate para traer el total de los registros de la tabla */
    $resultRegisters = $orders->ReadCount($tabledb);

    /*Asigno el total de registros a una variable*/
    $totalRegisters = $resultRegisters['totalRegisters'];

    /*declaro la variable que contiene el numero de paginas que tendra la tabla */
    $showPage = 5;

    /*valido que la variable page se le haya asignado un valor por el metodo get */
    if( empty($_GET['page']) ){

        $page = 1;

    }else{

        $page=$_GET['page'];
    }

    /*operacion para hayar el separador por paginas */
    $separator = ($page-1) * $showPage;

    /*operacion para hayar el total de la paginas*/
    $totalPage = ceil($totalRegisters / $showPage);

    $WHERE = "WHERE $a.$field2=$PedEstado";

    /*llamo al metodo ReadJoin2 para traer las ventas realizadas */  
    $resultOrders = $orders->ReadJoin($tabledb, $tabledb1, $a, $b, $field, $field1, $separator, $showPage, $WHERE);
    
?>
<!-- =================================
=INICIA TABLA PARA LISTAR LOS USUARIOS
==================================== -->
<div class="table-responsive">
    <div class="card-header">
        <h3>Pedidos<h3>
    </div>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th class="text-center" scope="col">#</th>
                <th class="text-center" scope="col">Cliente</th>
                <th class="text-center" scope="col">Fecha de Pedido</th>
                <th class="text-center" scope="col">Accion</th>
            </tr>
        </thead>
        <?php while( $search = mysqli_fetch_array($resultOrders)){ ?>
        <tbody>
            <tr>
                <td class="text-center"><?php $x+= 1; echo $x; ?> </td>
                <td class="text-center"><?php echo $search['UsuNombre']; ?> </td>
                <td class="text-center"><?php echo $search['PedFecha']; ?></td>
                <td class="text-center">
                    <a href="DetailsOrders.php?codigo=<?php echo $search['PedId'];  ?>"  class="btn btn-primary m-2">
                        Ver Detalles
                    </a> 
                </td>
            </tr>
            <?php } ?>
             <!-- Aqui inicia el paginador -->
             <tr>
                <td colspan="3"></td>
                <td colspan="1">
                    <ul class="d-flex list-inline text-end">
                        <li><a href="?page=<?php echo 1; ?>" class="btn p-2">|<</a></li>
                        <li><a href="?page=<?php echo $page-1; ?>" class="btn p-2"><<</a></li>
                        <?php 
                            for($i=1; $i <= $totalPage; $i++){
                                if($i == $page){

                                    echo '<li><a href="?page='.$i.'" class=" btn btn-secondary p-2">'.$i.'</a></li>';
                                }else{
                                    echo '<li><a href="?page='.$i.'" class="btn p-2">'.$i.'</a></li>';
                                }
                            }
                        
                        ?>
                        <li><a href="?page=<?php echo $page+1; ?>" class="btn p-2">>></a></li>
                        <li><a href="?page=<?php echo $totalPage; ?>" class="btn p-2">>|</a></li>
                    </ul>
                </td>
            </tr> <!-- Aqui termina el paginador -->
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
  


