<?php

    include '../setting/Connection.php';
    include '../CRUD/CRUD.php';

    /*=============================================================================
    =DECLARAR VARIABLES Y ASIGNARLES LOS DATOS TRAIDOS DEL FORMULARIO POR EL POST
    ===============================================================================*/

    $id          = $_POST["idProducto"];
    $name        = $_POST["name"];
    $price       = $_POST["price"];
    $amount      = $_POST["amount"];
    $active      = $_POST["active"];
    $supplier    = $_POST["supplier"];
    $description = $_POST["description"];

    /*==========================================================================
    =DECLARAR VARIABLES E INSTANCIAR LA CLASE CRUD PARA ACTUALIZAR LOS PRODUCTOS
    ============================================================================*/
    
    $field1  = "ProId";
    $field2  = "ProNombre";
    $field3  = "ProDescripcion";
    $field4  = "ProCantidad";
    $field5  = "ProPrecio";
    $field6  = "PrvId";
    $field7  = "ProActivo";
    $field8  = "ProImagen";
    $tabledb = "tblproducto";

    if(!empty($_FILES)) {
    
        $fields = "$field2='$name', $field3='$description', $field4=$amount, $field5=$price, $field6=$supplier, $field7=$active";
    
        $pro       = new CRUD();
        $classCRUD = $pro->Update($tabledb, $fields, $field1, $id);
    
        if($classCRUD){
    
            header ('location:ReadProducts.php');
    
        }else{
    
            echo "No se pudo hacer el cambio";
    
        }
    
    }else{

        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

        $fields = "$field2='$name', $field3='$description', $field4=$amount, $field5=$price, $field6=$supplier, $field7=$active, $field8=$image";
    
        $pro       = new CRUD();
        $classCRUD = $pro->Update($tabledb, $fields, $field1, $id);
    
        if($classCRUD){
    
            header ('location:ReadProducts.php');
    
        }else{
    
            echo "No se pudo hacer el cambio";
    
        }
    
    }

?>

    
  