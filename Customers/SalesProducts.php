<?php
    include '../template/headCustomer.php';
    include '../setting/setting.php';
    include '../setting/Connection.php';
    include '../CRUD/CRUD.php';
    
    /*=======================================================================
    =DECLARAR VARIABLES E INSTANCIAR LA CLASE CRUD PARA LLAMAR LOS PRODUCTOS
    =========================================================================*/
    
    $field = "ProId";
    $field1 = "ProActivo";
    $tabledb = "tblproducto";

    $products       = new CRUD();
    $resultProducts = $products->Read($tabledb, $field);

    
    ?>

<!--=======================
=CATALOGO DE PRODUCTOS
=========================-->

<div class="">
    <div class="card-deck d-flex justify-content-around flex-wrap">
        <?php 
            while($search = mysqli_fetch_array($resultProducts)){ 
                            
                    if($search['ProCantidad']==0){
                        $data = "$field1 = 2";
                        $active = $products->update($tabledb, $data, $field, $search['ProId'] );
                
                    }else{

                        $data = "$field1 = 1";
                        $active = $products->update($tabledb, $data, $field, $search['ProId'] );


                    }

                if($search['ProActivo']==1){ ?>

                    <div class="card shadow-sm w-25 p-3 m-3" >
                        <img class="card-img-top" width="80" height="150" alt="..." src="data:image/jpg;base64, <?php echo base64_encode($search['ProImagen']);  ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $search['ProNombre']; ?></h5>
                            <p class="card-text"><?php echo $search['ProDescripcion']; ?></p>
                            <p class="card-text"><?php echo moneda .number_format($search['ProPrecio'],2,'.',','); ?></p>
                            <strong class="text-danger"><?php echo "Disponible ".$search['ProCantidad']; ?></strong>
                            <form action="CartProducts.php" method="POST">
                                <div class="p-3">
                                    <label><h5 class="card-text">Cantidad</h5></label>
                                    <input name="codigo" type="hidden" min="1" max="" step="1" value="<?php echo $search['ProId']; ?>" size="5" onchange="">
                                    <input name="amount" type="number" min="1" max="<?php echo $search['ProCantidad']?>" step="1"  value="1" size="5" >     
                                </div>
                                <a  href="detailsProducts.php?codigo=<?php echo $search['ProId']; ?>" name="Detalles"class="btn btn-primary">Detalles</a>
                                <button type="submit" id="btn1" name="comprar" value="Añadiar al" class="btn btn-success">Añadir al
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                        <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                                    </svg>
                                </button>
                            </form>
                            
                        </div>
                    </div>
        <?php   }
            } 
        ?>
    </div>
</div>
<script>
/* $('#btn1').click(function show(){
            
                $.ajax({
                    
                    url: "CartProducts.php"
                    
                })
                .done(function(data){
                    $("#PayCart").html(data);  
                })
                .fail(function(){
    
                    console.log('fallo');
                }); 
           
    
        }); */
</script>
<?php  include "../template/footer.php "?>

