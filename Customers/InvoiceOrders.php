<?php   

    include '../template/headCustomer.php';
    include '../setting/setting.php';
    include '../setting/Connection.php';
    include '../CRUD/CRUD.php';
    include '../Funciones/funcion.php';

    /*============================================================================================
    =DECLARAR VARIABLES E INSTANCIAR LA CLASE CRUD PARA TRAER LOS DATOS DEL USUARIO DE DOS TABLAS
    ==============================================================================================*/

    $x         = 0;
    $a         = "f";
    $b         = "u";
    $c         = "pf";
    $d         = "p";
    $field     = "UsuIdUsuario";
    $field1    = "FacId";
    $field2    = "ProId";
    $field3    = "ProFacId";
    $tabledb   = "tblFactura";
    $tabledb1  = "tblusuario";
    $tabledb2  = "tblproducto";
    $tabledb3  = "tblproductofactura";

    /*Esto me trae el ultimo Id de la Factura */
    $ReadFactura = ReadAux($tabledb, $field1);
    $LastIdFac = $ReadFactura['MAX(FacId)'];

    /*Instancio la clase CRUD*/
    $invoice = new CRUD();
    $WHERE = "WHERE $field1=$LastIdFac";

    /*llamo al metodo ReadJoin para traer las ventas realizadas */  
    $resultInvoice = $invoice->ReadJoin($tabledb, $tabledb1, $a, $b, $field, $field1, $separator="", $showpage="", $WHERE);  
    $search = mysqli_fetch_array($resultInvoice);

    /*llamo al metodo ReadJoin para traer las productos asignados a la venta */  
    $resultDetails = $invoice->ReadJoin($tabledb3, $tabledb2, $c, $d, $field2, $field3, $separator="", $showpage="", $WHERE);

?>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiavOnline</title>
    <?php include "../Link/LinksCss.php"; ?>
</head>
<a href="downloadInvoice.php" class="btn btn-secondary">
    Descargar en PDF
</a>
<div class="wrapper">
    <div id="content">
        <div class="row">
            <div class="col-lg-8">
                <div class="card animate__animated animate__fadeIn">
                    <div class="card-header">
                        <b>Fecha: </b>
                        <strong><?php echo $search['FacFecha'];?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <span class="float-right"> <strong><b>Estado:</b></strong> Cancelada</span>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-6 col-md-4">
                                <h6 class="mb-2"><b>Tienda</b></h6>
                                <div>
                                    <strong>YESENIA S.A.</strong>
                                </div></br>
                                <div><b>Direccion</b>Barranquilla Atlantico</div>
                                <div><b>Email:</b> info@webz.com.pl</div>
                                <div><b>Telefono:</b> +57 314 666 3333</div>
                            </div>
                            <div class="col-6 col-md-4">
                                <h6 class="mb-2"><b>Cliente</b></h6>
                                <div>
                                    <strong><?php echo $search['UsuNombre'];?></strong>
                                </div></br>
                                <div><b>Direccion:</b><?php echo " ".$search['UsuDireccion'];?></div>
                                <div><b>Email:</b> <?php echo " ".$search['UsuCorreoElectronico'];?></div>
                                <div><b>Telefono:</b> <?php echo " ".$search['UsuTelefono'];?></div>
                            </div>
                            <div class="col-6 col-md-4">
                                <h5 class="text-center">
                                    <img class="mr-auto p-3 " width="250px" height= "100px" alt="..." src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/Proyectos/SiavOnline/images/logoSiavOnline.jpeg">
                                </h5> 
                                <h5 class="text-center"><b>SiavOnline</b><h5>
                                <h6 class="mb-2 text-center"><b>Factura No</b> <?php echo " ".$search['FacId'];?></h6>
                            </div>
                        </div>
                        <div class="table-responsive-sm">
                            <table class="table table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col" width="2%" class="center">#</th>
                                        <th scope="col" width="20%">Producto</th>
                                        <th scope="col" class="d-none d-sm-table-cell" width="23%">Descripción</th>
                                        <th scope="col" width="15%" class="text-right">Cantidad.</th>
                                        <th scope="col" width="20%" class="text-right">P. Unidad</th>
                                        <th scope="col" width="20%" class="text-right">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php while( $search2 = mysqli_fetch_array($resultDetails)){ 
                                    
                                    $amount = $search2['ProFacCantidad'];
                                    $price  = $search2['ProPrecio'];
                                    $total = $amount*$price;
                                    
                                ?>
                                    <tr>
                                        <td class="text-left"><?php echo $x+= 1;?></td>
                                        <td class="item_name"><?php echo $search2['ProNombre'];?></td>
                                        <td class="item_desc d-none d-sm-table-cell"><?php echo $search2['ProDescripcion'];?></td>
                                        <td class="text-right"><?php echo $amount;?></td>
                                        <td class="text-right"><?php echo moneda." " .number_format($price,0,'.',',');?></td>
                                        <td class="text-right"><?php echo moneda." " .number_format($total,0,'.',','); ?></td>
                                    </tr>
                                    <?php } ?>
                                
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 col-sm-5">

                            </div>
                            <div class="col-lg-4 col-sm-5 ml-auto">
                                <table class="table table-sm table-clear">
                                    <tbody>
                                        <tr>
                                            <td class="left">
                                                <strong>Subtotal</strong>
                                            </td>
                                            <td class="text-right bg-light"><?php echo moneda." " .number_format($search['FacValorTotal']-2000,0,'.',',');?></td>
                                        </tr>
                                        <tr>
                                            <td class="left">
                                                <strong>Descuento</strong>
                                            </td>
                                            <td class="text-right bg-light">$ 0</td>
                                        </tr>
                                        <tr>
                                            <td class="left">
                                                <strong>Costo de Envio</strong>
                                            </td>
                                            <td class="text-right bg-light"><?php echo moneda." " .number_format(2000,0,'.',',');?></td>
                                        </tr>
                                        <tr>
                                            <td class="left">
                                                <strong>Total</strong>
                                            </td>
                                            <td class="text-right bg-light">
                                                <strong><?php echo moneda." " .number_format($search['FacValorTotal'],0,'.',',');?></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer container-fluid mt-3 bg-light">
    <div class="row">
        <div class="col footer-app">&copy; Todos los derechos reservados · <span class="brand-name"></span></div>
    </div>
</div>
<script>
swal("Listo!", "Pedido Pagado con Exito!", "success")
</script>