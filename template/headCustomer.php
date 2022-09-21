<?php
    session_start();
    if(empty($_SESSION['active'])){

        header('location:../Index/Login.php');
    }
    
    $num_cart ="";
    if(isset($_SESSION['cart'])){

        $num_cart = count($_SESSION['cart']);
    }

?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SiavOnline</title>
        <?php include "../Link/LinksCss.php"; ?>
    </head>
    <nav class="navbar navbar-expand navbar-light bg-secondary">
        <img class="mr-auto" width="80px" height= "40px" src="../images/logoSiavOnline.jpeg"/>
        <a class="navbar-brand"><h3> &nbsp; &nbsp;  Bienvenido a SiavOnline &nbsp; <?php echo $_SESSION['nombre']; ?></h3></a>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="../Customers/ReadCartProducts.php" type="button" class="btn btn-secondary">
                        <span id="num_cart" class="badge bg-secondary">
                            <?php echo $num_cart ?>
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                        </svg>
                    </a>
                </li>
                <li class="nav-item">
                        <a class="nav-link text-info" href="SalesProducts.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-info" href="contactos.php">Contactenos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-info" href="opiniones.php">Opiniones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-info" href="../setting/out.php">Salir</a>
                </li>
            </ul>
        </div>
    </nav>
    
       

    
