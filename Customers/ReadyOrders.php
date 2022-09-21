<?php

    include '../template/headCustomer.php';
    include '../setting/Connection.php';
    include '../setting/setting.php';
    include '../CRUD/CRUD.php';
    include '../Funciones/funcion.php';

    /*=====================================================================
    =DECLARAR VARIABLES E INSTANCIAR LA CLASE CRUD PARA GUARDAR EL PEDIDO
    =======================================================================*/
    
    /*Declaro las variables a utilizar para hacer las diferentes inserciones y busquedas en la BD con el CRUD */
    $x         = 0;
    $total     = 0;
    $totalFactura = 0;
    $field     = "UsuIdUsuario";
    $iduser    = $_SESSION['iduser'];
    $field1    = "PedEstado";
    $field2    = "PedFecha";
    $field3    = "PrCantidad";
    $field4    = "ProId";
    $field5    = "PedId";
    $field6    = "ProFacCantidad";
    $field7    = "FacId";
    $tabledb   = "tblpedido";
    $tabledb1  = "tblproductopedido";
    $tabledb2  = "tblproducto";
    $tabledb3  = "tblfactura";
    $tabledb4  = "tblproductofactura";
    $PedFecha  = "now()";
    $PedEstado = 1;
    $FacEstado = 1;
    $iva       = 0.19;
    $a         = "f";
    $b         = "u";
    $c         = "pf";
    $field     = "UsuIdUsuario";

    /*Instancio la clase CRUD para poder hacer uso de ella */
    $ped = new CRUD();
    /*foreach para sacar el valor total de la factura */
    foreach($_SESSION['cart'] as $idProducts => $cantidad){

        $ReadProductos1 = $ped->ReadUpdate($tabledb2, $field4, $idProducts);
                                        
        $precio  = $ReadProductos1['ProPrecio'];  
                    
        $valor  = $precio * $cantidad;
        $totalFactura += $valor;
    }

    /* saco el total de la factura del foreach para guardarlo en la tabla factura*/
    $TotalFac  = $totalFactura+2000;

    /*declaro las variables que van como parametros para llamar al metodo Create*/
    $data   = "$PedFecha, $iva, $TotalFac, $FacEstado, $iduser";
    $fields = "FacFecha, FacIva, FacValorTotal, FacEstado, UsuIdUsuario";

    /*llamo el metodo Create para Insertar los datos en la tabla Factura*/
    $CreateFactura = $ped->Create($tabledb3, $fields, $data);

    /*Esto me trae el ultimo Id de la Factura */
    $ReadFactura = ReadAux($tabledb3, $field7);
    $LastIdFac = $ReadFactura['MAX(FacId)'];

    /*declaro las variables que van como parametros para llamar al metodo Create*/
    $data1   = "$iduser, $PedEstado, $PedFecha, $LastIdFac";
    $fields1 = "$field, $field1, $field2, $field7";

    /*llamo el metodo Create para Insertar los datos en la tabla Pedido*/
    $CreatePedido = $ped->Create($tabledb, $fields1, $data1);

    if(isset($_SESSION['cart'])){

        /*Esto me trae el ultimo Id del pedido*/
        $ReadPedido = ReadAux($tabledb, $field5);
        $LastIdPed = $ReadPedido['MAX(PedId)'];
    

        foreach($_SESSION['cart'] as $idPro => $amount){
   
            /*declaro las variables que van como parametros para llamar al metodo Create*/                            
            $data2   = "$amount, $idPro, $LastIdPed";
            $fields2 = "$field3, $field4, $field5";
            
            /* llamo al metodo Create para hacer la insercion a la tabla de productopedido */
            $CreateProductoPedido = $ped->Create($tabledb1, $fields2, $data2);

            /*declaro las variables que van como parametros para llamar al metodo Create*/
            $data3   = "$amount, $idPro, $LastIdFac";
            $fields3 = "$field6, $field4, $field7";

            /* llamo al metodo Create para hacer la insercion a la tabla de productofactura */
            $CreateProductoFactura = $ped->Create($tabledb4, $fields3, $data3);

        }
    }
        
    if($_SESSION['cart']){

        unset($_SESSION['cart']);
    }

    header('location: ../customers/InvoiceOrders.php');

    