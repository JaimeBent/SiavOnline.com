 <?php
     include '../template/headAdmin.php';
     include '../setting/Connection.php';
     include '../CRUD/CRUD.php';
 ?>
 
 <!-- ========================
    =INICIA FORMULARIO DE CREATE
    =========================== -->
    
    <div class="container">
            <div class="card d-flex justify-content-around flex-wrap">
                <div class="card-header">
                    <h3>Registrar Usuarios<h3>
                </div>
                <div
                    class="alert alert-danger mt-2 d-none"
                    id="alertDanger"
                >
                    <li>Minimo 8 caracteres</li>
                    <li>Maximo 15</li>
                    <li>Al menos una letra mayúscula</li>
                    <li>Al menos una letra minucula</li>
                    <li>Al menos un dígito</li>
                    <li>No espacios en blanco</li>
                    <li>Al menos 1 caracter especial</li>
            
                </div>
                <form action="CreateUserAdmin.php" method='post' id="form">
                    <div class="d-flex w-auto p-3">
                        <div class="d-inline w-100 p-3">
                            <label>Cedula</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="cedula" 
                                id="cedula" 
                                placeholder="Escribe su documento" 
                                value ="1127954902"
                            />
                            <p class="text-danger mb-2 d-none" id="alertCedula"></p>
                        </div>
                        <div class="d-inline w-100 p-3">
                            <label>Nombres y Apellidos</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="name" 
                                id="name" 
                                placeholder="Escribe su nombre completo"
                                value ="Carlos Alberto"
                            />
                            <p class="text-danger mb-2 d-none" id="alertName"></p>
                        </div>
                        <div class="d-inline w-100 p-3">
                            <label>Email</label>
                            <input 
                                type="email" 
                                class="form-control" 
                                name="email" 
                                id="email" 
                                placeholder="Escribe su Email"
                                value ="krlosalbert1995@hotmail.com"
                            />
                            <p class="text-danger mb-2 d-none" id="alertEmail"></p>
                        </div>
                        <div class="d-inline w-100 p-3">
                            <label>Celular</label>
                            <input 
                                type="number" 
                                class="form-control" 
                                name="phone" 
                                id="phone"
                                placeholder="Escribe su telefono"
                                value ="1127954902"
                            />
                            <p class="text-danger mb-2 d-none" id="alertPhone"></p>
                        </div>
                    </div>
                    <div class="d-flex w-auto p-3">
                        <div class="d-inline w-100 p-3">
                            <label>Direccion</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="addres" 
                                id="addres" 
                                placeholder="Escribe su Direccion"
                                value ="barranquilla"
                            />
                            <p class="text-danger mb-2 d-none" id="alertAddres"></p>
                        </div>
                        <div class="d-inline w-100 p-3">
                            <label>Rol</label>
                            <select name="role" id="role" class="form-control">
                                <option value="0" >Seleccione</option>
                                <?php       
                                
                                    $field   = "RolId";
                                    $tabledb = "tblrol";

                                    $role      = new CRUD();
                                    $resultRole = $role->Read($tabledb, $field);
                                    
                                    while( $search = mysqli_fetch_array($resultRole) ){

                                        echo '<option value="'.$search['RolId'].'">'.$search['RolDescripcion'].'</option>';
                                    }
                                ?>
                            </select>
                            <p class="text-danger mb-2 d-none" id="alertRole"></p>
                        </div>
                        <div class="d-inline w-100 p-3">
                            <label>Contraseña</label>
                            <input 
                                type="password" 
                                class="form-control" 
                                name="password" 
                                id="password" 
                                placeholder="Escribe su contraseña"
                                value ="Car1127954&"
                            />
                            <p class="text-danger mb-2 d-none" id="alertPassword"></p>
                        </div>
                        <div class="d-inline w-100 p-3">
                            <label>Confirmar Contraseña</label>
                            <input 
                                type="password" 
                                class="form-control" 
                                name="repeatPassword"  
                                id="repeatPassword" 
                                placeholder="confirmar contraseña"
                                value ="Car1127954&"
                            />
                            <p class="text-danger mb-2 d-none" id="alertRepeatPassword"></p>
                        </div>
                    </div>
                    <div class="form-check d-flex w-auto p-3">
                        <input type="checkbox" class="form-check-input d-inline m-2" id="exampleCheck1">
                        <label class="form-check-label d-inline w-100" for="exampleCheck1">he leido y acepto Terminos y condiciones</label>
                        <br/><br/>
                    </div>
                    <button type="submit" value="Enviar" class="btn btn-primary m-2">Guardar</button>
                </form>
                <script src="../Js/validationCustomers.js"></script>
            </div>
        </div>    

         
                   

                  
            