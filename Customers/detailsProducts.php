<?php 
    include '../setting/setting.php';
    include '../template/headcustomer.php'; 
    include '../Funciones/funcion.php';
    include '../setting/Connection.php';

    /*=======================================================================
    =DECLARAR VARIABLES E INSTANCIAR LA CLASE DE CONEXION A LA BASE DE DATOS
    =========================================================================*/
    $db      = new ConnectionDB();
    $connect = $db->connect();

    $id      = $_GET['codigo'];
    $field1  = "ProId";
    $field2  = "ProActivo";
    $tabledb = "tblproducto";
              
    $search = ("SELECT count($field1) FROM $tabledb WHERE $field1=$id AND $field2=1");
        
    $sqlsearch = mysqli_query($connect, $search);
   
    if( $sql= mysqli_fetch_Column($sqlsearch) > 0){
                
        $search = ("SELECT * FROM $tabledb WHERE $field1=$id AND $field2=1 LIMIT 1");
            
        $sql = mysqli_query($connect, $search);
        $row = mysqli_fetch_array($sql);        

        $name        = $row['ProNombre']; 
        $nit         = $row['PrvId'];
        $price       = $row['ProPrecio'];
        $image       = $row['ProImagen'];
        $amount      = $row['ProCantidad'];
        $active      = $row['ProActivo'];
        $descripcion = $row['ProDescripcion']; 

    }else{

            echo 'error al procesar la peticion';
            exit;
        }
?>
<div class="container">
    <div class="row">
        <div class="card w-25 p-3 m-3 " >
            <img class="card-img-top" width="70" height="150" alt="..." src="data:image/jpg;base64, <?php echo base64_encode($row['ProImagen']);  ?>">
        </div>
            <div class="card w-25 p-3 m-3 align-items-center">
                <h2><?php echo $name; ?></h2>
                <h3><?php echo 'Precio: ' .moneda .number_format($price,2,'.',','); ?></h3>
                <h5><?php echo 'Cantidad: '.$amount; ?></h2>
                <p class="lead"><?php echo $descripcion; ?></p>
                <a href="SalesProducts.php" type="submit" value="Atras" class="btn btn-danger">Regresar</a>
            </div>
        </div>
    </div>
</div>
