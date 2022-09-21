<?php 
    include '../template/headAdmin.php'; 
    include '../setting/Connection.php';
    include '../CRUD/CRUD.php'; 
?>

<div class="container">
    <div class="card d-flex justify-content-around flex-wrap">
        <div class="card-header">
            <img class="card-img-top" width="0" height="250" alt="..." src="../images/canastaVerdura.png.png">
            <h3>Producto Nuevo<h3>
        </div>
        <form action="CreateProducts.php" method="POST" enctype="multipart/form-data" id="formCreate">
            <div class="d-flex w-auto p-3">
                <div class="d-inline w-100 p-3">
                    <label>Nombre</label>
                    <input type="text" class="form-control" name="name" placeholder="Escribe nombre del producto">
                </div>
                <div class="d-inline w-100 p-3">
                    <label>Descripcion</label>
                    <input type="text" class="form-control" name="description" placeholder="Escribe descripcion del producto">
                </div>
                <div class="d-inline w-100 p-3">
                    <label>Cantidad</label>
                    <input type="number" class="form-control" name="amount" placeholder="Escribe cantidad del producto">
                </div>
            </div>
            <div class="d-flex w-auto p-3">
                <div class="d-inline w-100 p-3">
                    <label>precio</label>
                    <input type="number" class="form-control" name="price" placeholder="Escribe precio sin puntos ni comas">
                </div>
                <div class="d-inline w-100 p-3">
                    <label>Proveedor</label>
                    <select name="supplier" class="form-control">
                        <option value="0">Seleccione</option>
                        <?php       
                            $field= "PrvId";
                            $tabledb= "tblproveedor";

                            $sup = new CRUD();
                            $classCRUD = $sup->Read($tabledb, $field, 0, 100);

                            while( $search = $classCRUD->fetch_array() ){

                                echo '<option value="'.$search['PrvId'].'">'.$search['PrvNombre'].'</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="d-inline w-100 p-3">
                    <label>Activo</label>
                    <select name="active" class="form-control">
                        <option value="0">Seleccione</option>
                        <?php       

                            $si = "SI";
                            $no = "NO";

                            echo '<option value="1">'.$si.'</option>';
                            echo '<option value="2">'.$no.'</option>';
                            
                        ?>
                    </select>
                </div>
            </div>
            <div class="d-flex w-auto p-3">
                <div class="d-inline w-100 p-3">
                    <input type="file" class="form-control" name="image">
                    <label>Imagen</label>
                </div>
            </div>
                <button type="submit" value="Aceptar" class="btn btn-success">Guardar</button>
            </form>
        </div>
    </div>
    <script>
        $('#formCreate').submit(function(e){
            e.preventDefault();
    
            swal("Listo!", "Producto Guardado con Exito!", "success")
            .then((value) => {
                this.submit();
            }) 
        });
    </script> 
    <?php include '../template/footer.php'; ?>
</div>

