
/* #####################################
   Validación para Forms de Registro
  ##################################### */ 
// Variables de verificación de Compañeros
let validComp1 = true;
let validComp2 = true;
let validComp3 = true;
let validComp4 = true;
// Variables por id del form
const nombreProyectoEl = document.querySelector('#nombre_pro');
const areaEl = document.querySelector('#areaInput');

const nombreProfEl = document.querySelector('#nombreProfesor');
const edicionEl = document.querySelector('#edicion');

const nombreUfEl = document.querySelector('#nombreUf');
const descripEl = document.querySelector('#descripInput');
const nivelEl = document.querySelector('#nivelInput');
const videoEl = document.querySelector('#videoInput');
const posterEl = document.querySelector('#posterInput');

const Comp1El = document.querySelector('#Comp1');
const Comp2El = document.querySelector('#Comp2');
const Comp3El = document.querySelector('#Comp3');
const Comp4El = document.querySelector('#Comp4');

const emprende1 = document.querySelector('#inlineRadio1');
const emprende2 = document.querySelector('#inlineRadio2');

const form = document.querySelector('#signup');


// Variables booleanas para verificar varios aspectos de cada entrada

// Funciones booleanas para verificar varios aspectos de cada entrada
const checkComp1 = () => {
   validComp1 = false;
   const etiqueta = Comp1El;
   const matricula = etiqueta.value.trim();
   const tam = 9;
       
   if (isRequired(matricula)) {
      if (matricula.length != tam) {
         showError(etiqueta, `La Matrícula debe de ser de ${tam} caracteres`)

      } else if (areEqualsComp1(matricula)){
         showError(etiqueta, `No puedes tener compañeros repetidos`)
         
      } else {
         // Se manda consulta tipo Ajax al server para verificar
         var xhr = new XMLHttpRequest();
         xhr.open('POST', 'revisar_registro_proyecto.php', true);
         xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
         xhr.onreadystatechange = function() {
             if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                 // Handle server response
                 var response = JSON.parse(xhr.responseText); // Parse the response as JSON
                 if (response.exists) {
                     // El valor existe
                     showSuccess(etiqueta);
                     validComp1 = true;

                 } else {
                     // El valor NO existe
                     showError(etiqueta, `Tu compañero debe de estar registrado`)

                 }
             }
         };
         xhr.send('matricula=' + encodeURIComponent(matricula));
         
      }
   }
   else {
      removeError(etiqueta);
      validComp1 = true;
   }

};

const checkComp2 = () => {
   validComp2 = false;
   const etiqueta = Comp2El;
   const matricula = etiqueta.value.trim();
   const tam=9;
       
   if (isRequired(matricula)) {
      if (matricula.length != tam) {
         showError(etiqueta, `La Matrícula debe de ser de ${tam} caracteres`)

      } else if (areEqualsComp2(matricula)){
         showError(etiqueta, `No puedes tener compañeros repetidos`)
         
      } else {
         // Se manda consulta tipo Ajax al server para verificar
         var xhr = new XMLHttpRequest();
         xhr.open('POST', 'revisar_registro_proyecto.php', true);
         xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
         xhr.onreadystatechange = function() {
             if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                 // Handle server response
                 var response = JSON.parse(xhr.responseText); // Parse the response as JSON
                 if (response.exists) {
                     // El valor existe
                     showSuccess(etiqueta);
                     validComp2 = true;

                 } else {
                     // El valor NO existe
                     showError(etiqueta, `Tu compañero debe de estar registrado`)

                 }
             }
         };
         xhr.send('matricula=' + encodeURIComponent(matricula));
         
      }
   }
   else {
      removeError(etiqueta);
      validComp2 = true;
   }

};

const checkComp3 = () => {
   validComp3 = false;
   const etiqueta = Comp3El;
   const matricula = etiqueta.value.trim();
   const tam=9;
       
   if (isRequired(matricula)) {
      if (matricula.length != tam) {
         showError(etiqueta, `La Matrícula debe de ser de ${tam} caracteres`)

      } else if (areEqualsComp3(matricula)){
         showError(etiqueta, `No puedes tener compañeros repetidos`)
         
      } else {
         // Se manda consulta tipo Ajax al server para verificar
         var xhr = new XMLHttpRequest();
         xhr.open('POST', 'revisar_registro_proyecto.php', true);
         xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
         xhr.onreadystatechange = function() {
             if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                 // Handle server response
                 var response = JSON.parse(xhr.responseText); // Parse the response as JSON
                 if (response.exists) {
                     // El valor existe
                     showSuccess(etiqueta);
                     validComp3 = true;

                 } else {
                     // El valor NO existe
                     showError(etiqueta, `Tu compañero debe de estar registrado`)

                 }
             }
         };
         xhr.send('matricula=' + encodeURIComponent(matricula));
         
      }
   }
   else {
      removeError(etiqueta);
      validComp3 = true;
   }

};

const checkComp4 = () => {
   validComp4 = false;
   const etiqueta = Comp4El;
   const matricula = etiqueta.value.trim();
   const tam=9;
       
   if (isRequired(matricula)) {
      if (matricula.length != tam) {
         showError(etiqueta, `La Matrícula debe de ser de ${tam} caracteres`)

      } else if (areEqualsComp4(matricula)){
         showError(etiqueta, `No puedes tener compañeros repetidos`)
         
      } else {
         // Se manda consulta tipo Ajax al server para verificar
         var xhr = new XMLHttpRequest();
         xhr.open('POST', 'revisar_registro_proyecto.php', true);
         xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
         xhr.onreadystatechange = function() {
             if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                 // Handle server response
                 var response = JSON.parse(xhr.responseText); // Parse the response as JSON
                 if (response.exists) {
                     // El valor existe
                     showSuccess(etiqueta);
                     validComp4 = true;

                 } else {
                     // El valor NO existe
                     showError(etiqueta, `Tu compañero debe de estar registrado`)

                 }
             }
         };
         xhr.send('matricula=' + encodeURIComponent(matricula));
         
      }
   }
   else {
      removeError(etiqueta);
      validComp4 = true;
   }

};

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

   const nombreProf = nombreProfEl.value.trim();

   if (!isRequired(nombreProf)) {
      showError(nombreProfEl, 'Debe Seleccionar Una Opción');
  }  else {
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


const checkUf = () => {

   let valid = false;

   const uf = nombreUfEl.value.trim();

   if (!isRequired(uf)) {
       showError(nombreUfEl, 'Debe Seleccionar Una Opción');
   }  else {
       showSuccess(nombreUfEl);
       valid = true;
   }
   return valid;
};

const checkEdicion = () => {

   let valid = false;

   const edicion = edicionEl.value.trim();

   if (!isRequired(edicion)) {
       showError(edicionEl, 'Debe Seleccionar Una Opción');
   }  else {
       showSuccess(edicionEl);
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

   const video = videoEl.value.trim();

   if (!isRequired(video)) {
       showError(videoEl, 'Debe Subir un Link');
   } else {
       showSuccess(videoEl);
       valid = true;
   }
   return valid;
};

const checkPoster = () => {
   
   let valid = false;

   const poster = posterEl.value.trim();

   if (!isRequired(poster)) {
       showError(posterEl, 'Debe Subir un Link');
   } else {
       showSuccess(posterEl);
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

const areEqualsComp1 = matricula => matricula == Comp2El.value.trim() || matricula == Comp3El.value.trim() || matricula == Comp4El.value.trim() ? true : false;
const areEqualsComp2 = matricula => matricula == Comp1El.value.trim() || matricula == Comp3El.value.trim() || matricula == Comp4El.value.trim() ? true : false;
const areEqualsComp3 = matricula => matricula == Comp2El.value.trim() || matricula == Comp1El.value.trim() || matricula == Comp4El.value.trim() ? true : false;
const areEqualsComp4 = matricula => matricula == Comp2El.value.trim() || matricula == Comp3El.value.trim() || matricula == Comp1El.value.trim() ? true : false;

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

// Función para remover el error mostrado en pantalla
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
   let isNombreValid = checkNombreProyecto(),
       isNombreProfValid = checkNombreProf(),
       isAreaValid = checkArea(),
       isNombreUfValid = checkUf(),
       isDescripValid = checkDescrip(),
       isNivelValid = checkNivel(),
       isVideoValid = checkVideo(),
       isPosterValid = checkPoster(),
       isEdicionValid = checkEdicion(),
       isEmprendeValid = checkEmprende();

   // Variable que se utiliza para verificar todos los campos a validar
   let isFormValid = isNombreValid &&
   isNombreProfValid &&
   isAreaValid &&
   isNombreUfValid &&
   isDescripValid &&
   isNivelValid &&
   isVideoValid &&
   isPosterValid &&
   isEdicionValid &&
   isEmprendeValid &&
   validComp1 &&
   validComp2 &&
   validComp3 &&
   validComp4;

   // Se hace submit en caso de que todas las entradas sean válidas
   if (isFormValid) {
      e.target.submit();
   }
   else{
      Swal.fire({
         icon: 'error',
         title: 'Hay entradas Erróneas',
         text: 'Revisa las entradas que ingresaste',
         confirmButtonColor: '#1bb3eb',
         confirmButtonText: 'Regresar',
       });
   }
});

// Función de temporizador
const debounce = (fn, delay = 100) => {
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
      case 'nombreProfesor':
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
      case 'edicion':
         checkEdicion();
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
      case 'inlineRadio1':
         checkEmprende();
         break;
      case 'inlineRadio2':
         checkEmprende();
         break;
      case 'Comp1':
         checkComp1();
         break;
      case 'Comp2':
         checkComp2();
         break;
      case 'Comp3':
         checkComp3();
         break;
      case 'Comp4':
         checkComp4();
         break;
   }
}));