<?php 
    include '../setting/setting.php';
    include '../setting/Connection.php';
    include '../CRUD/CRUD.php';
    include '../Funciones/funcion.php';
    
    /*============================================================================================
    =DECLARAR VARIABLES E INSTANCIAR LA CLASE CRUD PARA TRAER LOS DATOS DEL USUARIO DE DOS TABLAS
    ==============================================================================================*/
    $field    = "PedEstado";
    $field1    = "PedId";
    $tabledb   = "tblpedido";
    $PedEstado = 3;
    $IdPedCurrent = $_GET['codigo'];
    
    $fields = "$field=$PedEstado";
    
    $ped       = new CRUD();
    $classCRUD = $ped->Update($tabledb, $fields, $field1, $IdPedCurrent);

    if ($classCRUD){
   
        header ('location:Orders.php') ;

    }else{

        echo "No se pudo hacer el cambio";

    }

?>