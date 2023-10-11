let container_diana = document.querySelector('.diana-container');
let dianaImagenGrande = document.querySelector('.diana-imagen-principal');
const imagenes_destacadas = document.querySelectorAll('.diana-imagen-secundaria');
const descripcion_producto = document.querySelector('#descripcion-producto');
const tituloProductoDestacado = document.querySelector('.titulo-producto-destacado');

imagenes_destacadas.forEach(element => {
    element.addEventListener('click', function () {
      let imagenSeleccionada = this.getAttribute('src'); // tomar ruta de la imagen clikeada
      let imagenPrincipal = dianaImagenGrande.getAttribute('src'); // tomar ruta de la imagen Principal

      let idImagenSeleccionada = this.getAttribute('id'); // tomar id de la imagen clikeada
      let idImagenPrincipal = dianaImagenGrande.getAttribute('id'); // tomar id de la imagen Principal

      element.setAttribute('src', imagenPrincipal); // cambiar IMAGEN del elemento seleccionado por la IMAGEN PRINCIPAL
      dianaImagenGrande.setAttribute('src', imagenSeleccionada); // cambiar IMAGEN PRINCIPAL por la IMAGEN SELECCIONADA
      
      element.setAttribute('id', idImagenPrincipal); // cambiar ID de la IMAGEN SELECCIONADA
      dianaImagenGrande.setAttribute('id', idImagenSeleccionada); // cambiar ID de la IMAGEN PRINCIPAL

      let id = idImagenSeleccionada;

      for (let index = 0; index < products.length; index++) {
        const product = products[index];
        if (id == index) {
          tituloProductoDestacado.innerText = product.name;
          descripcion_producto.innerText = product.description;
        }
      }
    });
});