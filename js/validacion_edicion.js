
/* #####################################
   Validación para Forms de Registro
  ##################################### */ 


// Variables de verificación de Compañeros con el servidor
let validComp1 = true;
let validComp2 = true;
let validComp3 = true;
let validComp4 = true;
let validLider = true;

// Variables por id para modificar etiquetas inluídas en el form de registro
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
const CompLid = document.querySelector('#Lid');

const emprende1 = document.querySelector('#inlineRadio1');
const emprende2 = document.querySelector('#inlineRadio2');

const form = document.querySelector('#signup');



// Funciones booleanas para verificar varios aspectos de cada entrada

// Función para revisar si la matrícula del primer compañero introducida es válida
const checkComp1 = () => {

   // Variables utilizadas para verificar las condiciones
   validComp1 = false;
   const etiqueta = Comp1El;
   const matricula = etiqueta.value.trim();
   const tam = 9;
       
   // Condiciones para verificar que la entrada sea válida
   if (isRequired(matricula)) {
      if (matricula.length != tam) {
         showError(etiqueta, `La Matrícula debe de ser de ${tam} caracteres`)

      } else if (areEqualsComp1(matricula)){
         showError(etiqueta, `No puedes tener compañeros repetidos`)
         
      } else {
         // Se manda consulta tipo Ajax al servidor para verificar si el correo ya está registrado
         var xhr = new XMLHttpRequest();
         xhr.open('POST', 'revisar_registro_proyecto.php', false);
         xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
         xhr.onreadystatechange = function() {
            // Se revisa si hubo una respuesta de la consulta Ajax
             if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                 // Se hace un parse de la respuesta para manejarla a través de JS
                 var response = JSON.parse(xhr.responseText); 
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
         // Se manda al servidos las siguientes variables a verificar
         xhr.send('matricula=' + encodeURIComponent(matricula));
         
      }
   }
   else {
      removeError(etiqueta);
      validComp1 = true;
   }

};

// Función para revisar si la matrícula del primer compañero introducida es válida
const checkLid = () => {
   // Variables utilizadas para verificar las condiciones
   validLider = false;
   const etiqueta = CompLid;
   const matricula = etiqueta.value.trim();
   const tam = 9;

   // Condiciones para verificar que la entrada sea válida       
   if (isRequired(matricula)) {
      if (matricula.length != tam) {
         showError(etiqueta, `La Matrícula debe de ser de ${tam} caracteres`)

      } else if (areEqualsCompLid(matricula)){
         showError(etiqueta, `No puedes tener compañeros repetidos`)
         
      } else {
         // Se manda consulta tipo Ajax al servidor para verificar si el correo ya está registrado
         var xhr = new XMLHttpRequest();
         xhr.open('POST', 'revisar_registro_proyecto.php', false);
         xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
         xhr.onreadystatechange = function() {
            // Se revisa si hubo una respuesta de la consulta Ajax
             if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                 // Se hace un parse de la respuesta para manejarla a través de JS
                 var response = JSON.parse(xhr.responseText); 
                 if (response.exists) {
                     // El valor existe
                     showSuccess(etiqueta);
                     validLider = true;

                 } else {
                     // El valor NO existe
                     showError(etiqueta, `Tu compañero debe de estar registrado`)

                 }
             }
         };
         // Se manda al servidos las siguientes variables a verificar
         xhr.send('matricula=' + encodeURIComponent(matricula));
         
      }
   }
   else if(!isRequired(matricula)){
      showError(etiqueta, 'La matrícula del líder no puede estar vacía');
   }
   else {
      removeError(etiqueta);
      validLider = true;
   }

};

// Función para revisar si la matrícula del segundo compañero introducida es válida
const checkComp2 = () => {
   // Variables utilizadas para verificar las condiciones
   validComp2 = false;
   const etiqueta = Comp2El;
   const matricula = etiqueta.value.trim();
   const tam=9;

   // Condiciones para verificar que la entrada sea válida    
   if (isRequired(matricula)) {
      if (matricula.length != tam) {
         showError(etiqueta, `La Matrícula debe de ser de ${tam} caracteres`)

      } else if (areEqualsComp2(matricula)){
         showError(etiqueta, `No puedes tener compañeros repetidos`)
         
      } else {
         // Se manda consulta tipo Ajax al servidor para verificar si el correo ya está registrado
         var xhr = new XMLHttpRequest();
         xhr.open('POST', 'revisar_registro_proyecto.php', false);
         xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
         xhr.onreadystatechange = function() {
            // Se revisa si hubo una respuesta de la consulta Ajax
             if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                 // Se hace un parse de la respuesta para manejarla a través de JS
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
          // Se manda al servidos las siguientes variables a verificar
         xhr.send('matricula=' + encodeURIComponent(matricula));
         
      }
   }
   else {
      removeError(etiqueta);
      validComp2 = true;
   }

};

// Función para revisar si la matrícula del segundo compañero introducida es válida
const checkComp3 = () => {
   // Variables utilizadas para verificar las condiciones
   validComp3 = false;
   const etiqueta = Comp3El;
   const matricula = etiqueta.value.trim();
   const tam=9;

   // Condiciones para verificar que la entrada sea válida
   if (isRequired(matricula)) {
      if (matricula.length != tam) {
         showError(etiqueta, `La Matrícula debe de ser de ${tam} caracteres`)

      } else if (areEqualsComp3(matricula)){
         showError(etiqueta, `No puedes tener compañeros repetidos`)
         
      } else {
         // Se manda consulta tipo Ajax al servidor para verificar si el correo ya está registrado
         var xhr = new XMLHttpRequest();
         xhr.open('POST', 'revisar_registro_proyecto.php', false);
         xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
         xhr.onreadystatechange = function() {
            // Se revisa si hubo una respuesta de la consulta Ajax
             if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                 // Se hace un parse de la respuesta para manejarla a través de JS
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
         // Se manda al servidos las siguientes variables a verificar
         xhr.send('matricula=' + encodeURIComponent(matricula));
         
      }
   }
   else {
      removeError(etiqueta);
      validComp3 = true;
   }

};

// Función para revisar si la matrícula del segundo compañero introducida es válida
const checkComp4 = () => {
   // Variables utilizadas para verificar las condiciones
   validComp4 = false;
   const etiqueta = Comp4El;
   const matricula = etiqueta.value.trim();
   const tam=9;

   // Condiciones para verificar que la entrada sea válida
   if (isRequired(matricula)) {
      if (matricula.length != tam) {
         showError(etiqueta, `La Matrícula debe de ser de ${tam} caracteres`)

      } else if (areEqualsComp4(matricula)){
         showError(etiqueta, `No puedes tener compañeros repetidos`)
         
      } else {
          // Se manda consulta tipo Ajax al servidor para verificar si el correo ya está registrado
         var xhr = new XMLHttpRequest();
         xhr.open('POST', 'revisar_registro_proyecto.php', false);
         xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
         xhr.onreadystatechange = function() {
            // Se revisa si hubo una respuesta de la consulta Ajax
             if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                 // Se hace un parse de la respuesta para manejarla a través de JS
                 var response = JSON.parse(xhr.responseText); 
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
         // Se manda al servidos las siguientes variables a verificar
         xhr.send('matricula=' + encodeURIComponent(matricula));
         
      }
   }
   else {
      removeError(etiqueta);
      validComp4 = true;
   }

};

// Función para revisar si el nombre del proyecto es válido
const checkNombreProyecto = () => {
   // Variables utilizadas para verificar las condiciones
   let valid = false;
   const min = 3,max = 50;
   const nombrePro = nombreProyectoEl.value.trim();

   // Condiciones para verificar que la entrada sea válida
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

// Función para revisar si el nombre del profesor dado es válido
const checkNombreProf = () => {
   // Variables utilizadas para verificar las condiciones
   let valid = false;
   const nombreProf = nombreProfEl.value.trim();

   // Condiciones para verificar que la entrada sea válida
   if (!isRequired(nombreProf)) {
      showError(nombreProfEl, 'Debe Seleccionar Una Opción');
  }  else {
      showSuccess(nombreProfEl);
      valid = true;
  }
  return valid;
};

// Función para revisar si la área estratégica es válida
const checkArea = () => {
   // Variables utilizadas para verificar las condiciones
   let valid = false;
   const area = areaEl.value.trim();
   // Condiciones para verificar que la entrada sea válida
   if (!isRequired(area)) {
       showError(areaEl, 'Debe Seleccionar Una Opción');
   }  else {
       showSuccess(areaEl);
       valid = true;
   }
   return valid;
};

// Función para revisar si la UF es válida
const checkUf = () => {
   // Variables utilizadas para verificar las condiciones
   let valid = false;
   const uf = nombreUfEl.value.trim();

   // Condiciones para verificar que la entrada sea válida
   if (!isRequired(uf)) {
       showError(nombreUfEl, 'Debe Seleccionar Una Opción');
   }  else {
       showSuccess(nombreUfEl);
       valid = true;
   }
   return valid;
};

// Función para revisar si la Edición es válida
const checkEdicion = () => {
   // Variables utilizadas para verificar las condiciones
   let valid = false;
   const edicion = edicionEl.value.trim();

   // Condiciones para verificar que la entrada sea válida
   if (!isRequired(edicion)) {
       showError(edicionEl, 'Debe Seleccionar Una Opción');
   }  else {
       showSuccess(edicionEl);
       valid = true;
   }
   return valid;
};

// Función para revisar si la descripción es válida
const checkDescrip = () => {
   // Variables utilizadas para verificar las condiciones
   let valid = false;
   const min = 20, max = 2000;
   const descrip = descripEl.value.trim();
   // Condiciones para verificar que la entrada sea válida
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

// Función para revisar si el nivel de desarrollo es válido
const checkNivel = () => {
   // Variables utilizadas para verificar las condiciones
   let valid = false;
   const nivel = nivelEl.value.trim();

   // Condiciones para verificar que la entrada sea válida
   if (!isRequired(nivel)) {
       showError(nivelEl, 'Debe Seleccionar Una Opción');
   }  else {
       showSuccess(nivelEl);
       valid = true;
   }
   return valid;
};

// Función para revisar si el url del video es válido
const checkVideo = () => {
   // Variables utilizadas para verificar las condiciones   
   let valid = false;
   const video = videoEl.value.trim();

   // Condiciones para verificar que la entrada sea válida
   if (!isRequired(video)) {
       showError(videoEl, 'Debe Subir un Link');
   } else {
       showSuccess(videoEl);
       valid = true;
   }
   return valid;
};

// Función para revisar si el url del póster es válido
const checkPoster = () => {
   // Variables utilizadas para verificar las condiciones   
   let valid = false;

   const poster = posterEl.value.trim();
   // Condiciones para verificar que la entrada sea válida
   if (!isRequired(poster)) {
       showError(posterEl, 'Debe Subir un Link');
   } else {
       showSuccess(posterEl);
       valid = true;
   }
   return valid;
};


// Función para revisar si el componente de emprendimiento es válido
const checkEmprende = () => {
   // Variables utilizadas para verificar las condiciones
   let valid = false;
   const e1 = emprende1;
   const e2 = emprende2;

   // Condiciones para verificar que la entrada sea válida
   if (e1.checked == false && e2.checked == false) {
      showErrorRadio(emprende2, 'Debe Seleccionar Una Opción');
   }  else {
      showSuccessRadio(emprende2);
       valid = true;
   }
   return valid;
};


//Variables de verificación del forms

// Se verifica si la entrada está vacía
const isRequired = value => value === '' ? false : true;

// Se verifica si la entrada supera cierta cantidad de caracteres
const isBigger = (length, min) => length < min ? false : true;

// Se verifica si la entrada está entre cierto rango de longitud de caracteres
const isBetween = (length, min, max) => length < min || length > max ? false : true;

// En las siguientes funciones se verifican diversos casos para revisar que no existan matrículas repetidas
const areEqualsComp1 = matricula => matricula == Comp2El.value.trim() || matricula == Comp3El.value.trim() || matricula == Comp4El.value.trim() || matricula == CompLid.value.trim() ? true : false;

const areEqualsComp2 = matricula => matricula == Comp1El.value.trim() || matricula == Comp3El.value.trim() || matricula == Comp4El.value.trim() || matricula == CompLid.value.trim() ? true : false;

const areEqualsComp3 = matricula => matricula == Comp2El.value.trim() || matricula == Comp1El.value.trim() || matricula == Comp4El.value.trim() || matricula == CompLid.value.trim() ? true : false;

const areEqualsComp4 = matricula => matricula == Comp2El.value.trim() || matricula == Comp3El.value.trim() || matricula == Comp1El.value.trim() || matricula == CompLid.value.trim() ? true : false;

const areEqualsCompLid = matricula => matricula == Comp2El.value.trim() || matricula == Comp3El.value.trim() || matricula == Comp1El.value.trim() || matricula == Comp4El.value.trim() ? true : false;



// Función para mostrar error en pantalla a través de etiquetas del archivo html
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

// Función para mostrar un delineado verde en la entrada dada a través de etiquetas del archivo html
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

// Función para mostrar un delineado verde en la entrada dada a través de etiquetas del archivo html para inputs de tipo radio
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

// Función para mostrar error en pantalla a través de etiquetas del archivo html para inputs de tipo radio
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
   checkComp1();
   checkComp2();
   checkComp3();
   checkComp4();
   checkLid();
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
   validComp4 &&
   validLider;


   // Se hace submit en caso de que todas las entradas sean válidas
   if (isFormValid) {
      e.target.submit();
   }
      // En caso de que alguna de las entradas no sea válida, se muestra una alerta en pantalla
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
      case 'Lid':
         checkLid();
         break;
   }
}));
