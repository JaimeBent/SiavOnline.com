<?php 
    
    include '../Funciones/funcion.php';
    include '../setting/Connection.php';
    include '../CRUD/CRUD.php';
    
    $id      = $_GET['codigo'];
    $field   = "ProId";
    $field1   = "PrvId";
    $tabledb = "tblproducto";
    $tabledb1= "tblproveedor";
    
    $products        = new CRUD();
    $resultProducts  = $products->ReadUpdate($tabledb, $field, $id);
    $resultProducts2 = $products->Read($tabledb1, $field1);
      
?>
<div class="container">
    <form action="UpdateProducts.php" method="POST" enctype="multipart/form-data" id="formCreate">
        <div class="form-group row">
            <div class="col-md-4">
                <input type="hidden" name="idProducto" value="<?php echo $resultProducts['ProId']; ?>" >
                <label><b>Nombre</b></label>
                <input type="text" class="form-control" name="name" value="<?php echo $resultProducts['ProNombre']; ?>">
            </div>
            <div class="col-md-4">
                <label><b>Descripcion</b></label>
                <input type="text" class="form-control" name="description" value="<?php echo $resultProducts['ProDescripcion']; ?>">
            </div>
            <div class="col-md-4">
                <label><b>Cantidad</b></label>
                <input type="number" class="form-control" name="amount" value="<?php echo $resultProducts['ProCantidad']; ?>">
            </div>
        </div><br>
        <div class="form-group row">
            <div class="col-md-4">
                <label><b>precio</b></label>
                <input type="number" class="form-control" name="price" value="<?php echo $resultProducts['ProPrecio']; ?>">
            </div>
            <div class="col-md-4">
                <label><b>Proveedor</b></label>
                <select name="supplier" class="form-control">
                    
                    <?php  
                        
                        if( $resultProducts['PrvId']>0 ){

                            $result = mysqli_fetch_array($resultProducts2);
                            
                            echo '<option value="'.$result['PrvId'].'">'.$result['PrvNombre'].'</option>';
                            
                            while( $search = mysqli_fetch_array($resultProducts2) ){

                                echo '<option value="'.$search['PrvId'].'">'.$search['PrvNombre'].'</option>';
                            };

                        }
                    ?>
                </select>
            </div>
            <div class="col-md-4">
                <label><b>Activo</b></label>
                <select name="active" class="form-control" >
                    <?php 
                        
                        $si = "SI";
                        $no = "NO";
                        $x = '<option value="1">'.$si.'</option>';
                        $y = '<option value="2">'.$no.'</option>';

                        if($resultProducts['ProActivo']==1 ){
                            echo $x;
                            echo $y;

                        }else{

                            echo $y;
                            echo $x;

                        }
                        
                    ?>
                </select>
            </div>
        </div><br>
            <div class="col-md-6">
                    <label><b>Imagen</b></label>
                    <img class="card-img-top" width="10" height="100" alt="..." src="data:image/jpg;base64, <?php echo base64_encode($resultProducts['ProImagen']);  ?>">
                    <input type="file" class="form-control" name="image" value="" >
            </div><br>
            <button type="submit" value="Aceptar" class="btn btn-warning"><b>Actualizar Producto</b></button>
        </form>
    </div>
 <!--    <script>
        $('#formCreate').submit(function(e){
            e.preventDefault();
    
            swal("Listo!", "Producto Actualizado con Exito!", "success")
            .then((value) => {
                this.submit();
            }) 
        });
    </script>  -->
             
</div>
 
