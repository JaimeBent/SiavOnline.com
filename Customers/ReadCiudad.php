<?php

    include '../setting/Connection.php';
    include '../CRUD/CRUD.php';

?>
    <label>Ciudad</label>
    <select name="role" class="form-control">
        <option value="0">Seleccione</option>
        <?php       
            $dep2     = $_POST['busqueda'];
            $field2   = "DepId";
            $tabledb2 = "tblciudad";
                   
            /* $ciu     = new CRUD();
            $resultCiudad = $ciu->ReadUpdate($tabledb2, $field2, $dep2); */

            $db = new ConnectionDB();
            $connect = $db->connect();

            $searchTable = "SELECT * FROM $tabledb2 WHERE $field2=$dep2";
            //echo $searchTable;
                
            $sqlTable = mysqli_query($connect, $searchTable);

            while(  $result = mysqli_fetch_array($sqlTable) ){
            
        ?> 
            <option value="<?php echo $result['CiuId'] ?>"><?php echo $result['CiuNombre'] ?></option>

        <?php
        }  

        ?>
    </select>
    <a href="ReadyOrders.php" type="submit" value="Enviar"  name="btn1" class="btn btn-success m-2">Pagar</a>
            

