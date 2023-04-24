
/* #####################################
   Validación para Forms de Registro
  ##################################### */ 

// Variables por id del form
let validIfCorreoExists = false;

const nombreEl = document.querySelector('#nombreProfesor');

const apellido1 = document.querySelector('#apellidoPaterno');
const apellido2 = document.querySelector('#apellidoMaterno');


const user = document.querySelector('#correoProfesor');
const server = document.querySelector('#serverProfesor');

const op1 = document.querySelector('#inlineRadio1');
const op2 = document.querySelector('#inlineRadio2');

const passwordEl = document.querySelector('#password');

const form = document.querySelector('#signup');


// Variables booleanas para verificar varios aspectos de cada entrada
const checkNombre = () => {

   let valid = false;

   const min = 1,
       max = 50;

   const nombre = nombreEl.value.trim();

   if (!isRequired(nombre)) {
       showError(nombreEl, 'El nombre no puede estar vacío');
   } else if (!isBetween(nombre.length, min, max)) {
       showError(nombreEl, `El nombre debe de ser entre ${min} y ${max} caracteres.`)
   } else if (!isNameValid(nombre)) {
      showError(nombreEl, `El nombre no es válido`)
   } else {
       showSuccess(nombreEl);
       valid = true;
   }
   return valid;
};

const checkApellidos = () => {

   let valid = false;

   const min = 1,
       max = 50;

   const app1 = apellido1.value.trim();
   const app2 = apellido2.value.trim();
   const apellidos = app1 + " " + app2;

   if (!isRequired(app1) || !isRequired(app2)) {
       showError(apellido2, 'Los apellidos no pueden estar vacíos');
   } else if (!isBetween(apellidos.length, min, max)) {
       showError(apellido2, `Los apellidos deben de ser entre ${min} y ${max} caracteres.`)
   } else if (!isNameValid(apellidos)) {
      showError(apellido2, `Uno o ambos apellidos son Inválidos`)
   } else {
       showSuccess(apellido2);
       valid = true;
   }
   return valid;
};

const checkCorreo = () => {
   const u = user.value.trim();
   const s = server.value.trim();
   const email = u + "@" + s;
   const min = 1,
       max = 30,
       tam = 9;

      //  console.clear();
      //  console.log(!isNaN(u[1]));
      //  console.log(u[0].toUpperCase() =="A");
       
   if (!isRequired(u) || !isRequired(s)) {
         showError(server, 'El correo no puede estar vacío.');
         validIfCorreoExists = false;

   } else if (!isBigger(u.length, min+1)) {
      showError(server, `La primera entrada debe ser mayor que ${min+1} caracteres.`)
      validIfCorreoExists = false;

   } else if (!isBetween(email.length,min,max)) {
      showError(server, `El correo debe de ser entre ${min} y ${max} caracteres.`)
      validIfCorreoExists = false;

   }  else if (!isEmailValid(email)) {
   showError(server, `El correo es Inválido`)
   validIfCorreoExists = false;

   } else {
      if (isBigger(u.length, min+1) && isRequired(s)) {
         if(s.toLowerCase() == "tec.mx" && u[0].toUpperCase() =="A" && !isNaN(u[1])){
            if (u.length != tam) {
               showError(server, `La Matrícula debe de ser de ${tam} caracteres`)
               validIfCorreoExists = false;
            }
            else{
               if (isRequired(u) && isRequired(s)) {
                  // Se manda consulta tipo Ajax al server para verificar
                  var xhr = new XMLHttpRequest();
                  xhr.open('POST', 'revisar_registro.php', false);
                  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                  xhr.onreadystatechange = function() {
                      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                          // Handle server response
                          var response = JSON.parse(xhr.responseText); // Parse the response as JSON
                          if (response.exists) {
                              // El valor existe
                              showError(server, `El correo ya está registrado`)
                              validIfCorreoExists = false;
            
                          } else {
                              // El valor NO existe
                              showSuccess(server);
                              validIfCorreoExists = true;
            
                          }
                      }
            
                  };
                  xhr.send('user=' + encodeURIComponent(u) + '&server=' + encodeURIComponent(s));
            
              } 
              else {
               removeError(server);
               validIfCorreoExists = true;
            }
            }
         }
         else{
            if (isRequired(u) && isRequired(s)) {
               // Se manda consulta tipo Ajax al server para verificar
               var xhr = new XMLHttpRequest();
               xhr.open('POST', 'revisar_registro.php', false);
               xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
               xhr.onreadystatechange = function() {
                   if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                       // Handle server response
                       var response = JSON.parse(xhr.responseText); // Parse the response as JSON
                       if (response.exists) {
                           // El valor existe
                           showError(server, `El correo ya está registrado`)
                           validIfCorreoExists = false;
         
                       } else {
                           // El valor NO existe
                           showSuccess(server);
                           validIfCorreoExists = true;
         
                       }
                   }
         
               };
               xhr.send('user=' + encodeURIComponent(u) + '&server=' + encodeURIComponent(s));
         
           } 
           else {
            removeError(server);
            validIfCorreoExists = true;
         }
         }
         
         }
      }

 
};



const checkEsJuez = () => {

   let valid = false;

   const u = user.value.trim();
   const s = server.value.trim();
   const e1 = op1;
   const e2 = op2;

   if(s.toLowerCase() == "tec.mx" && (isNaN(u[1]) || u[0].toLowerCase() == "l")){
      if (e1.checked == false && e2.checked == false) {
         showErrorRadio(op2, 'Debe Seleccionar Una Opción');
      } else {
         showSuccessRadio(op2);
            valid = true;
      }
   }
   else {
      removeErrorRadio(op2)
      valid = true;
   }
   return valid;
};

const checkPassword = () => {
   let valid = false;
   const password = passwordEl.value.trim();
   const min = 1,
   max = 30;

   if (!isRequired(password)) {
       showError(passwordEl, 'La contraseña no puede estar vacía.');
   } else if (!isBetween(password.length, min, max)) {
       showError(passwordEl, `La contraseña debe de ser entre ${min} y ${max} caracteres.`);
   } else {
       showSuccess(passwordEl);
       valid = true;
   }

   return valid;
};


//Variables de verificación del forms

const isRequired = value => value === '' ? false : true;
const isBigger = (length, min) => length < min ? false : true;
const isBetween = (length, min, max) => length < min || length > max ? false : true;

const isNameValid = (nombre) => {
   const re = /^[a-zA-ZàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ'`'\-]( ?[a-zA-ZàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ'`'\-])+$/;
   return re.test(nombre);
};

const isEmailValid = (email) => {
   const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
   return re.test(email);
};

// Función para mostrar error en pantalla
const showError = (input, message) => {
   // Consigue el padre y el padre del padre del input
   const parent = input.parentElement;
   const grandpa = input.parentElement.parentElement;
   // Añade la clase error al padre
   parent.classList.remove('exito');
   parent.classList.add('errores');

   // Muestra el mensaje de error al modificar el tag small del abuelo
   const error = grandpa.querySelector('small');
   error.textContent = message;
};

// Función para mostrar éxito en pantalla
const showSuccess = (input) => {
   // Consigue el padre y el padre del padre del input
   const parent = input.parentElement;
   const grandpa = input.parentElement.parentElement;

   // Quita la clase error al padre
   parent.classList.remove('errores');
   parent.classList.add('exito');

   // Esconde el mensaje de error al modificar el tag small del abuelo
   const error = grandpa.querySelector('small');
   error.textContent = '';
}

// Función para mostrar error en pantalla para inputs de tipo radio
const showErrorRadio = (input, message) => {
   // Consigue el padre del padre del input
   const grandpa = input.parentElement.parentElement;

   // Añade la clase error al padre del padre
   grandpa.classList.remove('exitoExtra');
   grandpa.classList.add('erroresExtra');

   // Muestra el mensaje de error al modificar el tag small del padre del abuelo
   const error = grandpa.parentElement.querySelector('small');
   error.textContent = message;
}

// Función para mostrar éxito en pantalla para inputs de tipo radio
const showSuccessRadio = (input) => {
   // Consigue el padre del padre del input
   const grandpa = input.parentElement.parentElement;

   // Esconde el mensaje de error al modificar el tag small del abuelo
   grandpa.classList.remove('erroresExtra');
   grandpa.classList.add('exitoExtra');
   
   // Quita el mensaje de error al modificar el tag small del padre del abuelo
   const error = grandpa.parentElement.querySelector('small');
   error.textContent = '';
}

const removeErrorRadio = (input) => {
   // Consigue el padre y el padre del padre del input
   const grandpa = input.parentElement.parentElement;

   // Quita la clase error al padre
   grandpa.classList.remove('erroresExtra');
   grandpa.classList.remove('exitoExtra');

   // Esconde el mensaje de error al modificar el tag small del abuelo

   const error = grandpa.parentElement.querySelector('small');
   error.textContent = '';
}

const removeError = (input) => {
   // Consigue el padre y el padre del padre del input
   const parent = input.parentElement;
   const grandpa = input.parentElement.parentElement;

   // Quita la clase error al padre
   parent.classList.remove('errores');
   parent.classList.remove('exito');

   // Esconde el mensaje de error al modificar el tag small del abuelo

   const error = grandpa.querySelector('small');
   error.textContent = '';
}

form.addEventListener('submit', function (e) {
   // Evita que el form se suba
   e.preventDefault();

   // Campos a validar
   checkCorreo();
   let isNombreValid = checkNombre(),
       isApellidosValid = checkApellidos(),
       isJuezValid = checkEsJuez(),
       isPasswordValid = checkPassword();

   let isFormValid = isNombreValid &&
   isApellidosValid &&
   isJuezValid &&
   validIfCorreoExists &&
   isPasswordValid;

   // console.clear()
   // console.log(`var isNombreValid: ${isNombreValid}`)
   // console.log(`var isApellidosValid: ${isApellidosValid}`)
   // console.log(`var isJuezValid: ${isJuezValid}`)
   // console.log(`var validIfCorreoExists: ${validIfCorreoExists}`)
   // console.log(`var isPasswordValid: ${isPasswordValid}`)
   // Se hace submit en caso de que todas las entradas sean válidas
   if (isFormValid) {
      e.target.submit();
   }
});

// Función de temporizador
const debounce = (fn, delay = 10) => {
   let timeoutId;
   return (...args) => {
       // Cancela el temporizador previo
       if (timeoutId) {
           clearTimeout(timeoutId);
       }
       // Crea un nuevo temporizador
       timeoutId = setTimeout(() => {
           fn.apply(null, args)
       }, delay);
   };
};

// Función para que se realicé un chequeo automático en cada entrada
form.addEventListener('input', debounce(function (e) {
   switch (e.target.id) {
      case 'nombreProfesor':
         checkNombre();
         break;
      case 'apellidoPaterno':
         checkApellidos();
         break;
      case 'apellidoMaterno':
         checkApellidos();
         break;
      case 'correoProfesor':
         checkCorreo();
         break;
      case 'serverProfesor':
         checkCorreo();
         break;
      case 'password':
         checkPassword();
         break;
      case 'inlineRadio1':
         checkEsJuez();
         break;
      case 'inlineRadio2':
         checkEsJuez();
         break;
   }
}));
