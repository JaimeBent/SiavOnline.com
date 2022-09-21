const form = document.getElementById("form");

//llamo los campos por sus id y le asigno variables
const userCedula = document.getElementById("cedula");
const userName = document.getElementById("name");
const userEmail = document.getElementById("email");
const userRole = document.getElementById("role");
const userAddres = document.getElementById("addres");
const userPhone = document.getElementById("phone");
const userPassword = document.getElementById("password");
const userRepeatPassword = document.getElementById("repeatPassword");

//llamo los respectivos alerts por id y le asigno variables
const alertSuccess = document.getElementById("alertSuccess");
const alertDanger = document.getElementById("alertDanger");
const alertCedula = document.getElementById("alertCedula");
const alertName = document.getElementById("alertName");
const alertPhone = document.getElementById("alertPhone");
const alertAddres = document.getElementById("alertAddres");
const alertRole = document.getElementById("alertRole");
const alertEmail = document.getElementById("alertEmail");
const alertPassword = document.getElementById("alertPassword");
const alertRepeatPassword = document.getElementById("alertRepeatPassword");

// uso las expresiones regulares para poder validar bien las contraseñas
const regUserCedula = /^\d+$/;
const regUserName = /^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$/;
const regUserEmail = /^[a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,15})$/;
const regUserPhone = /^\d+$/;
const regUserAddres = /[A-Za-z0-9]/;
const regUserPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])([A-Za-z\d$@$!%*?&]|[^ ]){8,15}$/;

/* const pintarMensajeExito = () => {
    alertSuccess.classList.remove("d-none");
    alertSuccess.textContent = "Mensaje enviado con éxito";
}; */

//declaro la alerta de error por si las contraseñas no cumplen con lo requerido
const showErrPasword = () => {
    alertDanger.classList.remove("d-none");
    
};

//asigno la funcion para pintar los respectivos mensajes de error
const pintarMensajeError = (errores) => {
    errores.forEach((item) => {
        item.tipo.classList.remove("d-none");
        item.tipo.textContent = item.msg;
    });
};

//llamo al evento listener para evitar el envio del formulario y hacer la respectiva validacion
form.addEventListener("submit", (e) => {
    e.preventDefault();
    
    /* alertSuccess.classList.add("d-none"); */

    //declaro el array que me va a contener las diferentes alertas
    const errores = [];

    // validar cedula
    if (!regUserCedula.test(userCedula.value) || !userCedula.value.trim()) {
        userCedula.classList.add("is-invalid");

        errores.push({
            tipo: alertCedula,
            msg: "Formato no válido campo Cedula, solo numeros",
        });
    } else {
        userCedula.classList.remove("is-invalid");
        userCedula.classList.add("is-valid");
        alertCedula.classList.add("d-none");
    }

    // validar nombre
    if (!regUserName.test(userName.value) || !userName.value.trim()) {
        userName.classList.add("is-invalid");

        errores.push({
            tipo: alertName,
            msg: "Formato no válido campo nombre, solo letras",
        });
    } else {
        userName.classList.remove("is-invalid");
        userName.classList.add("is-valid");
        alertName.classList.add("d-none");
    }

    // validar email
    if (!regUserEmail.test(userEmail.value) || !userEmail.value.trim()) {
        userEmail.classList.add("is-invalid");

        errores.push({
            tipo: alertEmail,
            msg: "Escriba un correo válido",
        });
    } else {
        userEmail.classList.remove("is-invalid");
        userEmail.classList.add("is-valid");
        alertEmail.classList.add("d-none");
    }
    //pregunto si la variable existe porque depende el formulario se va a usar
    if(userRole){

        var role = userRole.options[userRole.selectedIndex].value;
        
        // validar Role
        if (role != 0) {
            userRole?.classList.remove("is-invalid");
            userRole?.classList.add("is-valid");
            alertRole?.classList.add("d-none");
    
    
        } else {
            userRole.classList.add("is-invalid");
    
            errores.push({
                tipo: alertRole,
                msg: "Seleccione un Rol",
            });
        }
    }

    // validar telefono
    if (!regUserPhone.test(userPhone.value) || !userPhone.value.trim()) {
        userPhone.classList.add("is-invalid");

        errores.push({
            tipo: alertPhone,
            msg: "Formato no válido campo Telefono, solo numeros",
        });
    } else {
        userPhone.classList.remove("is-invalid");
        userPhone.classList.add("is-valid");
        alertPhone.classList.add("d-none");
    }

    // validar direccion
    if (!regUserAddres.test(userAddres.value) || !userAddres.value.trim()) {
        userAddres.classList.add("is-invalid");

        errores.push({
            tipo: alertAddres,
            msg: "Formato no válido campo Direccion, solo letras, - , numeros",
        });
    } else {
        userAddres.classList.remove("is-invalid");
        userAddres.classList.add("is-valid");
        alertAddres.classList.add("d-none");
    }

    // validar contraseña
    if (!regUserPassword.test(userPassword.value) || !userPassword.value.trim()) {
        userPassword.classList.add("is-invalid");

        errores.push({
            tipo: alertPassword,
            msg: showErrPasword(),
        });
    } else {
        userPassword.classList.remove("is-invalid");
        userPassword.classList.add("is-valid");
        alertPassword.classList.add("d-none");
    }

    // validar confirmacion de contraseña
    if (userPassword.value != userRepeatPassword.value) {

        userPassword.classList.add("is-invalid");
        userRepeatPassword.classList.add("is-invalid");

        errores.push({
            tipo: alertPassword,
            msg: "Contraseñas no coinciden",
        });
        errores.push({
            tipo: alertRepeatPassword,
            msg: "Contraseñas no coinciden",
        });

    } else {
        userPassword.classList.remove("is-invalid");
        userPassword.classList.add("is-valid");
        alertPassword.classList.add("d-none");
        alertDanger.classList.add("d-none");

        userRepeatPassword.classList.remove("is-invalid");
        userRepeatPassword.classList.add("is-valid");
        alertRepeatPassword.classList.add("d-none");
    }

    //pregunto para poder pintar los diferentes mensajes de error
    if (errores.length !== 0) {
        pintarMensajeError(errores);
        return;
    }

    //declaro la variable parametros para poder enviar los datos por metodo POST
    var parametros = "";

    //vuelvo a preguntar si existe la variavle para poder continuar
    if(userRole){
        
        parametros = { 
            
            "userCedula" : userCedula.value,
            "userName" : userName.value,
            "userEmail" : userEmail.value,
            "userAddres" : userAddres.value,
            "userRole" : userRole.value,
            "userPhone" : userPhone.value,
            "userPassword" : userPassword.value,
        };

    }else{

        parametros = { 
            "userCedula" : userCedula.value,
            "userName" : userName.value,
            "userEmail" : userEmail.value,
            "userAddres" : userAddres.value,
            "userPhone" : userPhone.value,
            "userPassword" : userPassword.value,
        };
    };
    
    //utilizo el metodo ajax para poder enviar los datos por metodo POST para la respectiva insersion a la BD
    $.ajax({
        data: parametros,
        url: 'CreateUsers.php',
        type: 'POST'
        
    })
    .done(function(data){
        swal("Listo!", "Usuario Guardado con Exito!,", "success")
        .then((value) => {
            if(window.location.pathname !== "/Proyectos/siavOnline/Users/CreateUserAdmin.php"){
            console.log(data);
                window.location.replace(`ReadUsers.php`); 
            }
        }) 
    })
    .fail(function(){

        console.log('fallo');
    }); 

});


//ESTO FUEN UN PASO QUE NO FUNCIONO PERO POR SI LO NECESITO LO DEJE AQUI
/*  fetch('http://localhost/Proyectos/siavOnline/Users/CreateUsers.php',{
      method: 'POST',
      headers: {
          'Content-Type': 'application/json'
      },
      body: {userCedula:userCedula.value, userName:userName.value, userEmail:userEmail.value, userAddres:userAddres.value, userPassword:userPassword.value, userRepeatPassword:userPassword.value}
  }) 
  .then(res => { 
      console.log(res);
      window.location.replace(`http://localhost/Proyectos/siavOnline/Users/CreateUsers.php`); 
  }); */
/*   window.location.replace(`http://localhost/Proyectos/siavOnline/Users/CreateUsers.php?${body}`); */
