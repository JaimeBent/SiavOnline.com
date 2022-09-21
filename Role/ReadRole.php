<?php

    include '../template/headAdmin.php'; 
    include '../setting/setting.php';
    include '../setting/Connection.php';
    include '../CRUD/CRUD.php';

    /*====================================================================
    =DECLARAR VARIABLES E INSTANCIAR LA CLASE CRUD PARA LLAMAR LOS ROLES
    ======================================================================*/

    $x       = 0;
    $field = "RolId";
    $tabledb = "tblrol";

    /*Instancio la clase CRUD*/
    $role = new CRUD();

    /*llamo al metodo ReadUpdate para traer el total de los registros de la tabla */
    $resultRegisters = $role->ReadCount($tabledb);

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

    /*llamo al metodo ReadJoin2 para traer las ventas realizadas */  
    $resultrole = $role->Read($tabledb, $field, $separator, $showPage);

?>

<!-- ======================
=INICIA LA TABLA DE READ 
========================= -->

<div class="row"> 
    <div class="col-md-3"></div>
    <div class="col-md-5" >
        <div class="card">
            <div class="card-header">
                <h3>Roles &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <!-- Button trigger modal paara editar -->
                    <button type="button" id="insert" class="btn btn-secondary" data-toggle="" data-target="#exampleModal">
                        Agregar
                    </button>
                <h3>
            </div>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center" scope="col">#</th>
                        <th class="text-center" scope="col">Descripcion</th>
                        <th class="text-center" scope="col">Accion</th>
                    </tr>
                </thead>
                <?php while($search = mysqli_fetch_array($resultrole) ){ ?>         
                <tbody>
                    <tr>  
                        <td class="text-center"><?php $x+= 1; echo $x; ?> </td>
                        <td class="text-center"><?php echo $search['RolDescripcion']; ?> </td>
                        <td class="text-center">
                            <?php $idphp= $search['RolId'];  ?>
                            <!-- Button trigger modal paara editar -->
                            <button type="button" id="Update" class="btn btn-warning" data-toggle="" data-target="#exampleModal" data-id=<?php echo $search['RolId']; ?>>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                </svg>
                            </button>
                            <button onclick="mostrar(<?php echo $idphp ?>)" type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalLong">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                            </button>
                        </td>
                    </tr>
                    <?php   }   ?>
                    <!-- Aqui inicia el paginador -->
                    <tr>
                        <td colspan="2"></td>
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
    </div>
</div>
<!-- Modal agregar rol-->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn btn-primary text-white">
                <h5 class="modal-title" id="exampleModalLongTitle">Nuevo Rol</h5>
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
<!-- Modal para editar -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn btn-warning text-black">
                <h5 class="modal-title">Editar Rol</h5>
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


<!-- ===============================================
=FINALIZA TABLA E INICIA EL SCRIPT PARA LAS ALERTAS
================================================== -->

<script>
//modal para agregar rol
    $(document).on("click", "#insert", function(){

    $.ajax({
            
            url: "FormCreateRole.php"
            
        })
        .done(function(data){
            $("#add  .modal-body").html(data);  
        })
        .fail(function(){

            console.log('fallo');
        }); 
        $('#add').modal('toggle');

    });

    //modal para editar
    $(document).on("click", "#Update", function(){
    var id =$(this).data("id");

    $.ajax({
            
            url: "FormUpdateRole.php?codigo="+id
            
        })
        .done(function(data){
            $("#edit  .modal-body").html(data);  
        })
        .fail(function(){

            console.log('fallo');
        }); 
        $('#edit').modal('toggle');

    });

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

                swal("Listo!", "Rol Eliminado con Exito!", "success")
                .then((value) => {
                    window.location.replace('DeleteRole.php?codigo='+x);
                }) 
            }
        });
    }
   
</script> 
<?php include '../template/footer.php'; ?>