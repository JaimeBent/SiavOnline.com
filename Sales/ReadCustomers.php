<?php 
    include '../setting/setting.php';
    include '../setting/Connection.php';
    //include '../CRUD/CRUD.php';
    
    $busqueda = $_POST['busqueda'];
    $accion = $_POST['accion'];
   // $amount = $_POST['amount'];
   
    $db = new ConnectionDB();
    $connect = $db->connect();

    if($accion == 1){
        $table = "tblusuario";
        $field = "UsuCedula";

        $searchTable = "SELECT * FROM $table WHERE $field like '$busqueda'";
    
        $sqlTable = mysqli_query($connect, $searchTable);
        
        $result = mysqli_fetch_array($sqlTable);
    
        if( !empty($result) ){
    
    ?>
    
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center" scope="col">Cedula</th>
                        <th class="text-center" scope="col">Nombre Completo</th>
                        <th class="text-center" scope="col">Direccion</th>
                        <th class="text-center" scope="col">Telefono</th>
                        <th class="text-center" scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center" >
                            <input type="text" class="form-control" id="busqueda" placeholder="Cedula" onchange="searchCustomer();" value="<?php echo $result['UsuCedula']; ?>">
                        </td>
                        <td class="text-center"><?php echo $result['UsuNombre']; ?></td>
                        <td class="text-center"><?php echo $result['UsuDireccion']; ?></td>
                        <td class="text-center"><?php echo $result['UsuTelefono']; ?></td>
                        <td class="text-center"><?php echo $result['UsuCorreoElectronico']; ?></td>
                    </tr>
                </tbody>
            </table>
    
    <?php  }else{  ?>
    
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center" scope="col">Cedula</th>
                        <th class="text-center" scope="col">Nombre Completo</th>
                        <th class="text-center" scope="col">Direccion</th>
                        <th class="text-center" scope="col">Telefono</th>
                        <th class="text-center" scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center" >
                            <input type="text" class="form-control" id="busqueda" placeholder="Cedula" onchange="searchCustomer();">
                        </td>
                        <td class="text-center"></td>
                        <td class="text-center">Cliente no existe</td>
                        <td class="text-center"></td>
                        <td class="text-center"></td>
                    </tr>
                </tbody>
            </table>
    
    <?php  }
}else{
        $table = "tblproducto";
        $field = "ProId";

        $searchTable = "SELECT * FROM $table WHERE $field like '$busqueda'";
    
        $sqlTable = mysqli_query($connect, $searchTable);
        
        $result = mysqli_fetch_array($sqlTable);
    
        if( !empty($result) ){

?>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center" scope="col">ID</th>
                    <th class="text-center" scope="col">Descripcion</th>
                    <th class="text-center" scope="col">Stock</th>
                    <th class="text-center" scope="col">Cantidad</th>
                    <th class="text-center" scope="col">Valor Unitario</th>
                    <th class="text-center" scope="col">Valor Total</th>
                    <th class="text-center" scope="col">Accion</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center" >
                        <input type="text" class="form-control"  placeholder="Id" id="products" onchange="searchProducts();" value="<?php echo $result['ProId']; ?>">
                    </td>
                    <td class="text-center"><?php echo $result['ProNombre']; ?> </td>
                    <td class="text-center"><?php echo $result['ProCantidad']; ?></td>
                    <td class="text-center">
                        <input type="number" class="form-control" placeholder="Cantidad" value="<?php echo $amount; ?>" onchange="searchProducts();">  
                    </td>
                    <td class="text-center"><?php echo moneda." " .number_format($result['ProPrecio'],0,'.',',');?> </td>
                    <td class="text-center"><?php ?> </td>
                    <td class="text-center">
                        <a href="#"  value="Enviar" class="btn btn-success m-2">Agregar</a>
                    </td>
                </tr>
            </tbody>
        </table>
 <?php   }  } ?>
    
   

