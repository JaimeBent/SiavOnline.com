<?php 

    include '../template/headStart.php';

?>
    <!-- ========================
    =INICIA FORMULARIO DE CREATE
    =========================== -->
    
    <div class="container">
        <div class="card d-flex justify-content-around flex-wrap ">
            <div class="card-header">
                <h3>Registrate<h3>
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

                <form action="CreateUsers.php" method="post" id="form">
                    <div class="d-flex w-auto p-3">
                    <div class="d-inline w-50 p-3">
                        <label>Cedula</label>
                        <input 
                        type="text"
                        class="form-control" 
                        name="cedula" 
                        placeholder="Escribe tu numero de documento"
                        id="cedula"
                        value ="1127954902"
                        />
                        <p class="text-danger mb-2 d-none" id="alertCedula"></p>
                    </div>
                    <div class="d-inline w-50 p-3">
                        <label>Nombres y Apellidos</label>
                        <input 
                        type="text" 
                        class="form-control" 
                        name="name" 
                        placeholder="Escribe tu nombre completo"
                        id="name" 
                        value ="Carlos Alberto"
                        />
                        <p class="text-danger mb-2 d-none" id="alertName"></p>
                    </div>
                    <div class="d-inline w-50 p-3">
                        <label>Email</label>
                        <input 
                        type="email" 
                        class="form-control" 
                        name="email" 
                        placeholder="Escribe tu Email"
                        id="email"
                        value ="krlosalbert1995@hotmail.com"
                        />
                        <p class="text-danger mb-2 d-none" id="alertEmail"></p>
                    </div>
                </div>
                <div class="d-flex w-auto p-3">
                    <div class="d-inline w-50 p-3">
                        <label>Celular</label>
                        <input 
                        type="number" 
                        class="form-control" 
                        name="phone" 
                        placeholder="Escribe tu numero de telefono"
                        id="phone"
                        value ="3205634878"
                        />
                        <p class="text-danger mb-2 d-none" id="alertPhone"></p>
                    </div>
                    <div class="d-inline w-50 p-3">
                        <label>Direccion</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            name="addres" 
                            placeholder="Escribe tu Direccion"
                            id="addres" 
                        />
                        <p class="text-danger mb-2 d-none" id="alertAddres"></p>
                    </div>
                    <div class="d-inline w-50 p-3">
                        <label>Contraseña</label>
                        <input 
                            type="password" 
                            class="form-control" 
                            name="password" 
                            placeholder="Escribe tu contraseña"
                            id="password"
                            value ="Car1127954&"
                        />
                        <p class="text-danger mb-2 d-none" id="alertPassword"></p>
                    </div>
                </div>
                <div class="d-flex w-auto p-3">
                    <div class="d-inline w-50 p-3"> 
                        <label>Confirmar Contraseña</label>
                        <input 
                            type="password" 
                            class="form-control" 
                            name="repeatPassword" 
                            placeholder="confirmar contraseña"
                            id="repeatPassword" 
                            value ="Car1127954&"
                        />
                        <p class="text-danger mb-2 d-none" id="alertRepeatPassword"></p>
                    </div>
                    <div class="d-inline w-50 p-3"></div>
                    <div class="d-inline w-50 p-3"></div>
                </div>
                <div class="form-check d-flex w-auto p-3">
                    <input type="checkbox" class="form-check-input d-inline m-2" id="exampleCheck1">
                    <label class="form-check-label d-inline w-100" for="exampleCheck1">he leido y acepto Terminos y condiciones</label>
                    <br/><br/>
                </div>
                <button type="submit" value="Enviar" name="btn1" class="btn btn-primary m-2">
                    Guardar
                </button>    
            </form>
            <div
                class="alert alert-success mt-2 d-none"
                id="alertSuccess"
            ></div>
        </div>
    </div>  
    <script src="../Js/validationCustomers.js"></script>
</body>

<?php include '../template/footer.php'; ?>

