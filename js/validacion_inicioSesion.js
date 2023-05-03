/* ###########################################
   Validación para Forms de Inicio de Sesión
  ########################################### */ 

// variables booleanas para verificar valores con el servidor
let validIfCorreoExists = false;
var validIfPassCorrect = false;

// Variables por id para modificar etiquetas inluídas en el form de registro
const user = document.querySelector('#correoProfesor');
const server = document.querySelector('#serverProfesor');

const passwordEl = document.querySelector('#password');

const form = document.querySelector('#signup');

const url = window.location.pathname.toString();



// Funciones booleanas para verificar varios aspectos de cada entrada

// Función para revisar si el correo introducido es válido
const checkCorreo = () => {

   // Variables utilizadas para verificar las condiciones
   const u = user.value.trim();
   const s = server.value.trim();
   const email = u + "@" + s;
   const min = 1, max = 30, tam = 9;
       
   // Condiciones para verificar que la entrada sea válida
   if (!isRequired(u) || !isRequired(s)) {
       showError(server, 'El correo no puede estar vacío.');
       validIfCorreoExists = false;

   } else if (!isBigger(u.length,min+1,max)) {
      showError(server, `La primera entrada debe ser mayor que ${min+1} caracteres.`)
      validIfCorreoExists = false;
      
  } else if (!isBetween(email.length,min,max)) {
   showError(server, `El correo debe de ser entre ${min} y ${max} caracteres.`)
   validIfCorreoExists = false;
   
  } else if (!isEmailValid(email)) {
   showError(server, `El correo es inválido`)
   validIfCorreoExists = false;

  } else if (s.toLowerCase() == "tec.mx" && u[0].toUpperCase() =="A" && !isNaN(u[1]) && u.length != tam) {
   showError(server, `La Matrícula debe de ser de ${tam} caracteres`)
   validIfCorreoExists = false;


  } else {
   showSuccess(server)
   validIfCorreoExists = true;
   }

 

};

// Función para revisar si el correo existe en el servidor
const checkIfCorreoExists = () => {
   // Variables utilizadas para verificar las condiciones
   const u = user.value.trim();
   const s = server.value.trim();
   const email = u + "@" + s;
   const min = 1,
       max = 30,
       tam = 9;
       
   // Condiciones para verificar que la entrada sea válida
   if (isBigger(u.length, min+1) && isRequired(s)) {
   if(s.toLowerCase() == "tec.mx" && u[0].toUpperCase() =="A" && !isNaN(u[1])){
      if (u.length != tam) {
         showError(server, `La Matrícula debe de ser de ${tam} caracteres`)
         validIfCorreoExists = false;
      }
      else{
         if (isRequired(u) && isRequired(s)) {
            // Se manda consulta tipo Ajax al servidor para verificar si el correo ya está registrado
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'revisar_inicioSesion.php', false);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
               // Se revisa si hubo una respuesta de la consulta Ajax
                  if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                     // Se hace un parse de la respuesta para manejarla a través de JS
                     var response = JSON.parse(xhr.responseText); 
                     if (response.correo) {
                        // El valor existe
                        showSuccess(server);
                        validIfCorreoExists = true;

      
                     } else {
                        // El valor NO existe
                        showError(server, `El correo no está registrado, porfavor registre su correo antes de iniciar sesión`)
                        validIfCorreoExists = false;
      
                     }
                  }
      
            };
            // Se manda al servidos las siguientes variables a verificar
            xhr.send('password=' + encodeURIComponent(u) + '&url=' + encodeURIComponent(url) + '&user=' + encodeURIComponent(u) + '&server=' + encodeURIComponent(s));
      
         } 
      }
   }
   else{
      if (isRequired(u) && isRequired(s)) {
         // Se manda consulta tipo Ajax al servidor para verificar si el correo ya está registrado
         var xhr = new XMLHttpRequest();
         xhr.open('POST', 'revisar_inicioSesion.php', false);
         xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
         xhr.onreadystatechange = function() {
            // Se revisa si hubo una respuesta de la consulta Ajax
               if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                  // Se hace un parse de la respuesta para manejarla a través de JS
                  var response = JSON.parse(xhr.responseText); // Parse the response as JSON
                  if (response.correo) {
                     // El valor existe
                     showSuccess(server);
                     validIfCorreoExists = true;
   
                  } else {
                     // El valor NO existe
                     showError(server, `El correo no está registrado, porfavor registre su correo antes de iniciar sesión`)
                     validIfCorreoExists = false;
   
                  }
               }
   
         };
         // Se manda al servidos las siguientes variables a verificar
         xhr.send('password=' + encodeURIComponent(u) + '&url=' + encodeURIComponent(url) + '&user=' + encodeURIComponent(u) + '&server=' + encodeURIComponent(s));
   
      } 
   }
   }

 

};

// Función para revisar si la contraseña es válida
const checkPassword = () => {
   // Variables utilizadas para verificar las condiciones
   const u = user.value.trim();
   const s = server.value.trim();
   const password = passwordEl.value.trim();
   const min = 1,
   max = 30;

   // Condiciones para verificar que la entrada sea válida 
   if (!isRequired(password)) {
       showError(passwordEl, 'La contraseña no puede estar vacía.');
       validIfPassCorrect = false;
   } else if (!isBetween(password)) {
       showError(passwordEl, `La contraseña debe de ser entre ${min} y ${max} caracteres.`);
       validIfPassCorrect = false;
   } 
   else {
      showSuccess(passwordEl)
      validIfPassCorrect = true;

   }


};

// Función para revisar si la contraseña dada es congurente con la existente en el servidor con respecto al correo dado
const checkIfPasswordCorrect = () => {
   // Variables utilizadas para verificar las condiciones
   const u = user.value.trim();
   const s = server.value.trim();
   const password = passwordEl.value.trim();

   // Condiciones para verificar que la entrada sea válida 
   if (isRequired(password) && isRequired(u) && isRequired(s)) {
      // Se manda consulta tipo Ajax al servidor para verificar si el correo ya está registrado
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'revisar_inicioSesion.php', false);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function() {
         // Se revisa si hubo una respuesta de la consulta Ajax
          if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
              // Se hace un parse de la respuesta para manejarla a través de JS
              var response = JSON.parse(xhr.responseText); 
               if (response.exists) {
                  // El valor existe
                  showSuccess(passwordEl);
                  validIfPassCorrect = true;

               } else {
                  // El valor NO existe
                  showError(passwordEl, `La contraseña es incorrecta!`)
                  validIfPassCorrect = false;
               }

          }

      };
      // Se manda al servidos las siguientes variables a verificar
      xhr.send('password=' + encodeURIComponent(password) + '&url=' + encodeURIComponent(url) + '&user=' + encodeURIComponent(u) + '&server=' + encodeURIComponent(s));

}


};


// Funciones de verificación de diversos aspectos de las entradas dadas

// Se verifica si la entrada está vacía
const isRequired = value => value === '' ? false : true;

// Se verifica si la entrada supera cierta cantidad de caracteres
const isBigger = (length, min) => length < min ? false : true;

// Se verifica si la entrada está entre cierto rango de longitud de caracteres
const isBetween = (length, min, max) => length < min || length > max ? false : true;

// Se utiliza una expresión regular para verificar si el correo dado es válido 
const isEmailValid = (email) => {
   const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
   return re.test(email);
};


// Función para mostrar error en pantalla a través de etiquetas del archivo html
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

// Función para mostrar un delineado verde en la entrada dada a través de etiquetas del archivo html
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

// Función para eliminar todo tipo de mensaje en una entrada
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

// Función para verificar todas las entradas antes de realizar el 'sumbit' del formulario
form.addEventListener('submit', function (e) {
   // Evita que el form se suba
   e.preventDefault();

   // Campos a validar
   checkPassword();
   checkCorreo();
   checkIfCorreoExists();
   checkIfPasswordCorrect();

   let isFormValid = 
   validIfCorreoExists &&
   validIfPassCorrect;

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

// Función para que se realicé un chequeo automático en cada entrada cuando se modifique el Input correspondiente
form.addEventListener('input', debounce(function (e) {
   switch (e.target.id) {
      case 'correoProfesor':
         checkCorreo();
         break;
      case 'serverProfesor':
         checkCorreo();
         break;
      case 'password':
         checkPassword();
         break;
   }
}));