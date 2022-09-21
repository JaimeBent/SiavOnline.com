<?php
    include '../setting/Connection.php';
    include "../CRUD/CRUD.php";

    $id      = $_POST['IdPro'];
    $amount  = $_POST['amount'];
    $field1  = "EntCantidad";
    $field2  = "ProId";
    $tabledb = "tblentrada";

    $data = "$amount, $id";
    $fields = "$field1, $field2";

    $add       = new CRUD();
    $classCRUD = $add->create($tabledb, $fields, $data);

    if($classCRUD){

        header("location: ".$_SERVER['HTTP_REFERER']."");

    }else{

        echo"mal hecho";
    }


?>
    