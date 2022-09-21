<?php 
    include '../template/headStart.php';
    include '../setting/setting.php';
    include '../setting/Connection.php';
    include '../CRUD/CRUD.php';

    /*=======================================================================
    =DECLARAR VARIABLES E INSTANCIAR LA CLASE CRUD PARA LLAMAR LOS PRODUCTOS
    =========================================================================*/
    
    $field = "ProId";
    $tabledb = "tblproducto";

    $products = new CRUD();
    $resultProducts = $products->Read($tabledb, $field, 0, 100);
   
?>

<!-- =======================
=CATALOGO DE LOS PRODUCTOS
========================== -->

<div class="">
    <div class="card-deck d-flex justify-content-around flex-wrap">
        <?php while($search= mysqli_fetch_array($resultProducts)){ ?>
        <div class="card shadow-sm w-25 p-3 m-3" >
            <img class="card-img-top" width="80" height="150" alt="..." src="data:image/jpg;base64, <?php echo base64_encode($search['ProImagen']);  ?>">
            <div class="card-body">
                <h5 class="card-title"><?php echo $search['ProNombre']; ?></h5>
                <p class="card-text"><?php echo $search['ProDescripcion']; ?></p>
                <p class="card-text"><?php echo moneda .number_format($search['ProPrecio'],2,'.',','); ?></p>
                <a href="login.php" name="comprar"class="btn btn-primary">Comprar</a>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<?php  include "../template/footer.php " ?>