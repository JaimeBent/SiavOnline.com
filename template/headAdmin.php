<?php
    session_start();
    if(empty($_SESSION['active'])){

        header('location: ../Index/Login.php');
    } 

    $num_Orders=0;
    $field = "PedEstado";
    $field1 = 1;
    $tabledb = "tblpedido";


    include '../Funciones/funcion.php';

    $resultRegisters = ReadCount($tabledb, $field, $field1);

    /*Asigno el total de registros a una variable*/
    $totalRegisters = $resultRegisters['totalRegisters'];
 
?>

<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiavOnline</title>
    <?php include "../Link/LinksCss.php"; ?>
  </head>
  <div class="wrapper">
    <nav id="sidebar">
      <div class="sidebar-header">
        <img class="mr-auto" width="80px" height= "40px" src="../images/logoSiavOnline.jpeg"/>
      </div>
      <ul class="list-unstyled components">
        <li class="active">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
              <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
            </svg>&nbsp; Usuarios
          </a>
          <ul class="dropdown-menu" role="menu">
            <li>
              <a href="../Users/FormCreateUserAdmin.php">Nuevo</a>
            </li>
            <li>
              <a href="../Users/ReadUsers.php">Consultar</a>
            <li>
              <a href="../Role/ReadRole.php">Rol</a>
            </li>
            </li>
          </ul>
        </li>
        <li class="active">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
              <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
            </svg>&nbsp; Productos
          </a>
          <ul class="dropdown-menu" role="menu">
            <li>
              <a href="../Products/FormCreateProducts.php">Nuevo</a>
            </li>
            <li>
              <a href="../Products/ReadProducts.php">Consultar</a>
            </li>
          </ul>
        </li>
        <li class="active">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-p-square" viewBox="0 0 16 16">
              <path d="M5.5 4.002h2.962C10.045 4.002 11 5.104 11 6.586c0 1.494-.967 2.578-2.55 2.578H6.784V12H5.5V4.002Zm2.77 4.072c.893 0 1.419-.545 1.419-1.488s-.526-1.482-1.42-1.482H6.778v2.97H8.27Z"/>
              <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2Zm15 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2Z"/>
            </svg>&nbsp; Proveedores</a>
          <ul class="dropdown-menu" role="menu">
            <li>
              <a href="../Supplier/FormCreateSupplier.php">Nuevo</a>
            </li>
            <li>
              <a href="../Supplier/ReadSupplier.php">Consultar</a>
            </li>
          </ul>
        </li>
        <li class="active">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-check-fill" viewBox="0 0 16 16">
              <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708z"/>
            </svg>&nbsp; Pedidos
            <span id="num_cart" class="
              <?php
                if($totalRegisters==0){
                  echo "badge bg-secondary";
                  
                }else{
                  echo "badge bg-danger";
                }
              
              ?>
            
            ">
              <?php echo $totalRegisters ?>
            </span>
          </a>
          <ul class="dropdown-menu" role="menu">
            <li>              
              <a href="../Sales/Orders.php">Consultar Pedidos</a>
            </li>
          </ul>
        </li>
        <li class="active">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-check-fill" viewBox="0 0 16 16">
              <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708z"/>
            </svg>&nbsp; Ventas
          </a>
          <ul class="dropdown-menu" role="menu">     
            <li>
              <a href="../Sales/NewSales.php">Nueva Venta</a>
            </li>
            <li>
              <a href="../SALES/ReadSales.php">Consultar</a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>

    <!-- Menu secundario  -->
    <div id="content">
      <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
        <div class="container-fluid">
            <a class="navbar-brand" href="interfazTienda.php"><h3>Bienvenido Administrador</h3></a>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-info" href="">
                        <?php echo $_SESSION['nombre']; ?> 
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-info" href="../setting/out.php">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z"/>
                          </svg>&nbsp; Salir
                        </a>
                    </li>
                </ul>
            </div>
        </div>
      </nav>