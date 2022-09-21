<?php 
    include '../template/headStart.php';
    include '../Funciones/funcion.php';
    $valor1 = filter_input(INPUT_POST,'txtusuario'); 
    $valor2 = filter_input(INPUT_POST,'txtcontraseña'); 
   
    
?>
<div class="container">
        <div class="row"> 
            <div class="col-md-4"></div>
                <div class="col-md-4" >
                    <div class="card" >
                        <div class="card-header">
                            <img class="card-img-top" width="0" height="100" alt="..." src="../images/logoSiavOnline.jpeg">
                            </br>
                            <h4>Bienvenido a SiavOnline<h4>
                        </div>
                        <div class="card-body" >
                            <?php if(isset($_POST['btn1'])){  ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo validacion($valor1,$valor2);  } ?>
                            </div>
                            <form class="m-0" action="login.php"  method='post'>
                                <div class = "form-group m-0 p-2">
                                    <input type="text" class="form-control" name="txtusuario" placeholder="Escribe tu numero de documento">
                                    <label>Usuario</label>
                                </div>
                                <div class="form-group p-2">
                                    <input type="password" class="form-control" name="txtcontraseña" placeholder="Escribe tu contraseña">
                                    <label>Contraseña</label>
                                </div>
                                <button type="submit" value="Enviar"  name="btn1" class="btn btn-primary m-2">Ingresar</button>
                            </form>
                            <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../Users/CreateUsers.php">¿No tienes una cuenta? Registrate aqui</a>
                                <a class="dropdown-item" href="#">¿Olvidaste tu contraseña?</a>
                            </div>
                    </div>
                </div>
            </div>
        <?php// include 'footer.php'; ?>
    </body>
</html>
