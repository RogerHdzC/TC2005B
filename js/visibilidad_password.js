/* ###################################################
      Botón para cambiar visibilidad de Contraseña
   ################################################### */

   // Variables Utilizadas para manipular las etiquetas del archivo html
   let alternarContra = document.querySelector('#togglePassword');
   let contra = document.querySelector('#password');
   let tipo;
   
   // Se agrega una función cuando se da click 
   alternarContra.addEventListener('click', function () {
       // Cambiar la visibilidad de la contraseña modificando el atributo 'type' del input
       tipo = contra.getAttribute('type') === 'password' ? 'text' : 'password';
       contra.setAttribute('type', tipo);
       
       // Cambiar el formato de la imagen
       this.classList.toggle('bi-eye');
   });