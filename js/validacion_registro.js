
/* #####################################
   Validación para Forms de Registro
  ##################################### */ 

// Variables por id del form
const nombreEl = document.querySelector('#nombreProfesor');

const apellido1 = document.querySelector('#apellidoPaterno');
const apellido2 = document.querySelector('#apellidoMaterno');


const user = document.querySelector('#correoProfesor');
const server = document.querySelector('#serverProfesor');

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
   let valid = false;
   const u = user.value.trim();
   const s = server.value.trim();
   const email = u + "@" + s;
   const min = 1,
       max = 30;
       
   if (!isRequired(u) || !isRequired(s)) {
       showError(server, 'El correo no puede estar vacío.');

   } else if (!isBigger(u.length,min+1,max)) {
      showError(server, `La primera entrada debe ser mayor que ${min+1} caracteres.`)
      
  } else if (!isBetween(email.length,min,max)) {
   showError(server, `El correo debe de ser entre ${min} y ${max} caracteres.`)
   
  }  else if (!isEmailValid(email)) {
   showError(server, `El correo es Inválido`)

}else {
       showSuccess(server);
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
   } else if (!isBetween(password)) {
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


form.addEventListener('submit', function (e) {
   // Evita que el form se suba
   e.preventDefault();

   // Campos a validar
   let isNombreValid = checkNombre(),
       isApellidosValid = checkApellidos(),
       isCorreoValid = checkCorreo(),
       isPasswordValid = checkPassword();

   let isFormValid = isNombreValid &&
   isApellidosValid &&
   isCorreoValid &&
   isPasswordValid;

   // Se hace submit en caso de que todas las entradas sean válidas
   if (isFormValid) {
      e.target.submit();
   }
});

// Función de temporizador
const debounce = (fn, delay = 500) => {
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
   }
}));