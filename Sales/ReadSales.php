<?php 

    include '../template/headAdmin.php'; 
    include '../setting/setting.php';
    include '../setting/Connection.php';
    include '../CRUD/CRUD.php';

    /*============================================================================================
    =DECLARAR VARIABLES E INSTANCIAR LA CLASE CRUD PARA TRAER LOS DATOS DEL USUARIO DE DOS TABLAS
    ==============================================================================================*/

    $x         = 0;
    $a         = "f";
    $b         = "u";
    $field     = "UsuIdUsuario";
    $field1    = "FacEstado";
    $field2    = "FacId";
    $tabledb   = "tblFactura";
    $tabledb1  = "tblusuario";
    $FacEstado = 1;

    /*Instancio la clase CRUD*/
    $sales = new CRUD();

    /*llamo al metodo ReadUpdate para traer el total de los registros de la tabla */
    $resultRegisters = $sales->ReadCount($tabledb, $field1, $FacEstado);

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
    $WHERE = "WHERE $a.$field1=$FacEstado";
    
    /*llamo al metodo ReadJoin2 para traer las ventas realizadas */  
    $resultSales = $sales->ReadJoin($tabledb, $tabledb1, $a, $b, $field, $field2, $separator, $showPage, $WHERE);  
?>

<div class="row">
    <div class="col-lg-12">
        <div class="card-header">
            <h3>Ventas<h3>
        </div>
        <table id="tbl_productos" class="table table-striped w-100 shadow">
            <thead>
                <tr>
                    <th class="text-center" >#</th>
                    <th class="text-center" >Cliente</th>
                    <th class="text-center" >Fecha</th>
                    <th class="text-center" >No de factura</th>
                    <th class="text-center" >Monto $</th>
                    <th class="text-center" >Accion</th>
                </tr>
            </thead>
            <?php while( $search = mysqli_fetch_array($resultSales)){ ?>
            <tbody>
                <tr>
                    <td class="text-center"><?php $x+= 1; echo $x; ?> </td>
                    <td class="text-center"><?php echo $search['UsuNombre']; ?> </td>
                    <td class="text-center"><?php echo $search['FacFecha']; ?></td>
                    <td class="text-center"><?php echo $search['FacId']; ?></td>
                    <td class="text-center"><?php echo  moneda." " .number_format($search['FacValorTotal'],0,'.',','); ?></td>
                    <td class="text-center">
                        <!-- Button trigger modal -->
                        <button type="button" id="btnModal" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" data-id=<?php echo $search['FacId']; ?>>
                            Ver Factura
                        </button>
                    </td>
                </tr>
                <?php } ?>
                <!-- Aqui inicia el paginador -->
                <tr>
                    <td colspan="4"></td>
                    <td colspan="2">
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
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header btn btn-info text-black">
                <h5 class="modal-title"> Detalle Factura</h5>
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
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
     $(document).on("click", "#btnModal", function(){
        var id =$(this).data("id");

        $.ajax({
                
                url: "Invoice.php?id="+id
                
            })
            .done(function(data){
                $("#add  .modal-body").html(data);  
            })
            .fail(function(){

                console.log('fallo');
            }); 
            $('#add').modal('toggle');

    });


    $(document).ready(function(){

        var table;

        table = $("#tbl_productos").DataTable({

            language:{
                url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            }
        });



    })

</script>

