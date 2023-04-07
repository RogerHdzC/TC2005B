
/* #################################
      Botón de Área Estratégica
  ################################# */ 

// Variables

let btnApertura = document.querySelector('#area');
let container = document.querySelector('#popUp-container');
let text = document.querySelector('#texto');
let btnCerrado = document.querySelector('#btn-salida');

// Event Listeners 

btnApertura.addEventListener('click', function(){
   text.innerHTML = `<b>Nano</b>: Hace referencia a proyectos que resuelvan necesidades enfocadas a temáticas de sensores, materiales avanzados, biomedicina e ingeniería de tejidos.<br></br><b>Bio</b>: Incluye proyectos que resuelvan necesidades de las áreas de bioprocesos, biología sintética, ingeniería metabólica y las omics que son genómica, proteómica, transcriptómica, metabolómica, biosistemas agroalimentarios, alimentos.<br></br><b>Nexus</b>: Aquellos proyectos que resuelvan necesidades relacionadas con el agua, la energía y los alimentos.<br></br><b>Cyber.</b>: Incluye proyectos cuyo enfoque sea la solución de necesidades en temas de desarrollo de software, ciberseguridad, ciencia de datos, inteligencia artificial, fábricas digitales e internet de las cosas.`;
   container.style.display = 'block';
});

btnCerrado.addEventListener('click', function() {

   container.style.display = 'none';
});

window.addEventListener('click', function(e) {

    if (e.target === container) {
      container.style.display = 'none';
    }
});

/* #################################
   Botón de Descripción del Proyecto
  ################################# */

// Variables

btnApertura = document.querySelector('#descrip');

// Event Listeners

btnApertura.addEventListener('click', function(){
   text.innerHTML = `Escribe una descripción de tu Proyecto de máximo <b>200 palabras</b>.`;
   container.style.display = 'block';
});

/* #################################
      Botón de Correo de Compañero
  ################################# */

// Variables

btnApertura = document.querySelector('#compañero');

// Event Listeners

btnApertura.addEventListener('click', function(){
   text.innerHTML = `Escribe El Correo de cada uno de tus compañeros.<br></br>En caso de tener <b>Menos de 4 compañeros</b>, Deja en blanco los espacios.`;
   container.style.display = 'block';
});

/* #################################
      Botón de Nivel de Desarrollo
  ################################# */

// Variables

btnApertura = document.querySelector('#nivel');

// Event Listeners

btnApertura.addEventListener('click', function(){
   text.innerHTML = `<b>Concepto (Nivel TRL o SRL 1-3)</b>: El proyecto se encuentra en nivel de investigación básica de la problemática, tal vez cuenta con cierta parte del bosquejo e ideación y/o cuenta ya con alguna prueba de concepto utilizando modelaciones y simulaciones.<br></br><b>Prototipo (Nivel TRL o SRL 4-6)</b>: El proyecto ya cuenta con una validación a nivel laboratorio o taller, cuenta con un prototipo funcional de baja resolución. Las pruebas que se han realizado de la investigación o producto ya cuentan con una identificación de las mejoras y trabajos futuros que se deben realizar para una siguiente etapa.<br></br><b>Producto Terminado (Nivel TRL o SRL 7-9)</b>: Ya se han realizado pruebas en campo y ya solo queda ajustar pequeños detalles. El producto o protocolo ya se encuentra listo para los primeros usuarios`;
   container.style.display = 'block';
});

/* #################################
        Botón de Subir Video
  ################################# */

// Variables

btnApertura = document.querySelector('#video');

// Event Listeners

btnApertura.addEventListener('click', function(){
   text.innerHTML = `El formato del <b>Video</b> y <b>Póster</b> se encuentran en el apartado de <a href="preguntas_frecuentes_estudiante.php"><b>Preguntas Frecuentes</b></a>`;
   container.style.display = 'block';
});

/* #################################
        Botón de Subir Imagen
  ################################# */

// Variables

btnApertura = document.querySelector('#imagen');

// Event Listeners

btnApertura.addEventListener('click', function(){
   text.innerHTML = `Sube una Imagen libre de <b>Copyright</b> &copy; relacionada a tu proyecto.`;
   container.style.display = 'block';
});
