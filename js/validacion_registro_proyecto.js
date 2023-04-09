
/* #####################################
   Validación para Forms de Registro
  ##################################### */ 

// Variables por id del form
const nombreProyectoEl = document.querySelector('#nombre_pro');
const nombreProfEl = document.querySelector('#nombre_prof');
const areaEl = document.querySelector('#areaInput');

const user = document.querySelector('#correoProfesor');
const server = document.querySelector('#serverProfesor');

const nombreUfEl = document.querySelector('#nombreUf');
const descripEl = document.querySelector('#descripInput');
const nivelEl = document.querySelector('#nivelInput');
const videoEl = document.querySelector('#videoInput');
const posterEl = document.querySelector('#posterInput');
const imagenEl = document.querySelector('#imagenInput');

const emprende1 = document.querySelector('#inlineRadio1');
const emprende2 = document.querySelector('#inlineRadio2');

const form = document.querySelector('#signup');


// Variables booleanas para verificar varios aspectos de cada entrada
const checkNombreProyecto = () => {

   let valid = false;

   const min = 3,
       max = 50;

   const nombrePro = nombreProyectoEl.value.trim();

   if (!isRequired(nombrePro)) {
       showError(nombreProyectoEl, 'El nombre del proyecto no puede estar vacío');
   } else if (!isBetween(nombrePro.length, min, max)) {
       showError(nombreProyectoEl, `El nombre del proyecto debe de ser entre ${min} y ${max} caracteres.`)
   } else {
       showSuccess(nombreProyectoEl);
       valid = true;
   }
   return valid;
};

const checkNombreProf = () => {

   let valid = false;

   const min = 1,
       max = 50;

   const nombreProf = nombreProfEl.value.trim();

   if (!isRequired(nombreProf)) {
       showError(nombreProfEl, 'El nombre del profesor no puede estar vacío');
   } else if (!isBetween(nombreProf.length, min, max)) {
       showError(nombreProfEl, `El nombre del profesor debe de ser entre ${min} y ${max} caracteres.`)
   } else if (!isNameValid(nombreProf)) {
      showError(nombreProfEl, `El nombre del profesor es Inválidos`)
   } else {
       showSuccess(nombreProfEl);
       valid = true;
   }
   return valid;
};

const checkArea = () => {

   let valid = false;

   const area = areaEl.value.trim();

   if (!isRequired(area)) {
       showError(areaEl, 'Debe Seleccionar Una Opción');
   }  else {
       showSuccess(areaEl);
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

const checkUf = () => {

   let valid = false;

   const min = 3,
       max = 50;

   const uf = nombreUfEl.value.trim();

   if (!isRequired(uf)) {
       showError(nombreUfEl, 'El nombre de la UF no puede estar vacío');
   } else if (!isBetween(uf.length, min, max)) {
       showError(nombreUfEl, `El nombre de la UF debe de ser entre ${min} y ${max} caracteres.`)
   } else {
       showSuccess(nombreUfEl);
       valid = true;
   }
   return valid;
};

const checkDescrip = () => {

   let valid = false;

   const min = 20,
       max = 200;

   const descrip = descripEl.value.trim();

   if (!isRequired(descrip)) {
       showError(descripEl, 'La Descripción no puede estar vacía');
   } else if (!isBetween(descrip.length, min, max)) {
       showError(descripEl, `La Descripción del proyecto debe de ser entre ${min} y ${max} caracteres.`)
   } else {
       showSuccess(descripEl);
       valid = true;
   }
   return valid;
};

const checkNivel = () => {

   let valid = false;

   const nivel = nivelEl.value.trim();

   if (!isRequired(nivel)) {
       showError(nivelEl, 'Debe Seleccionar Una Opción');
   }  else {
       showSuccess(nivelEl);
       valid = true;
   }
   return valid;
};

const checkVideo = () => {
   
   let valid = false;
   let extension = "mp4";
   const video = videoEl.value.trim();

   if (!isRequired(video)) {
       showError(videoEl, 'Debe Subir un Archivo');
   } else if (!validate_fileupload(video, extension)) {
      showError(videoEl, 'Tipo de Archivo Inválido');
  } else {
       showSuccess(videoEl);
       valid = true;
   }
   return valid;
};

const checkPoster = () => {
   
   let valid = false;
   let extension = "pdf";
   const poster = posterEl.value.trim();

   if (!isRequired(poster)) {
       showError(posterEl, 'Debe Subir un Archivo');
   } else if (!validate_fileupload(poster, extension)) {
      showError(posterEl, 'Tipo de Archivo Inválido');
  } else {
       showSuccess(posterEl);
       valid = true;
   }
   return valid;
};

const checkImagen = () => {
   
   let valid = false;
   let extension = "png";
   const imag = imagenEl.value.trim();

   if (!isRequired(imag)) {
       showError(imagenEl, 'Debe Subir un Archivo');
   } else if (!validate_fileupload(imag, extension)) {
      showError(imagenEl, 'Tipo de Archivo Inválido');
  } else {
       showSuccess(imagenEl);
       valid = true;
   }
   return valid;
};

const checkEmprende = () => {

   let valid = false;

   const e1 = emprende1;
   const e2 = emprende2;

   if (e1.checked == false && e2.checked == false) {
      showErrorRadio(emprende2, 'Debe Seleccionar Una Opción');
   }  else {
      showSuccessRadio(emprende2);
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

function validate_fileupload(fileName, extension)
{
    let file_extension = fileName.split('.').pop(); // Función para obtener la extensión del archivo
    console.log(extension == file_extension);

        if(extension == file_extension){
            return true;
        }


    return false;
}

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
   if (input.tagName.toLowerCase() === 'select' || input.tagName.toLowerCase() === 'textarea'){
      parent.classList.remove('exitoExtra');
      parent.classList.add('erroresExtra');
   }
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
   if (input.tagName.toLowerCase() === 'select' || input.tagName.toLowerCase() === 'textarea'){
      parent.classList.remove('erroresExtra');
      parent.classList.add('exitoExtra');
   }

   const error = grandpa.querySelector('small');
   error.textContent = '';
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


form.addEventListener('submit', function (e) {
   // Evita que el form se suba
   e.preventDefault();

   // Campos a validar
   let isNombreValid = checkNombreProyecto(),
       isNombreProfValid = checkNombreProf(),
       isAreaValid = checkArea(),
       isCorreoValid = checkCorreo(),
       isNombreUfValid = checkUf();
       isDescripValid = checkDescrip();
       isNivelValid = checkNivel();
       isVideoValid = checkVideo();
       isPosterValid = checkPoster();
       isImagenValid = checkImagen();
       isEmprendeValid = checkEmprende();

   // Variable que se utiliza para verificar todos los campos a validar
   let isFormValid = isNombreValid &&
   isNombreProfValid &&
   isAreaValid &&
   isCorreoValid &&
   isNombreUfValid &&
   isNivelValid &&
   isVideoValid &&
   isPosterValid &&
   isEmprendeValid;

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
      case 'nombre_pro':
         checkNombreProyecto();
         break;
      case 'nombre_prof':
         checkNombreProf();
         break;
      case 'areaInput':
         checkArea();
         break;
      case 'correoProfesor':
         checkCorreo();
         break;
      case 'serverProfesor':
         checkCorreo();
         break;
      case 'nombreUf':
         checkUf();
         break;
      case 'descripInput':
         checkDescrip();
         break;
      case 'nivelInput':
         checkNivel();
         break;
      case 'videoInput':
         checkVideo();
         break;
      case 'posterInput':
         checkPoster();
         break;
      case 'imagenInput':
         checkImagen();
         break;
      case 'inlineRadio1':
         checkEmprende();
         break;
      case 'inlineRadio2':
         checkEmprende();
         break;
   }
}));