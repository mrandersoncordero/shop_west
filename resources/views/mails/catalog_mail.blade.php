
<main style="margin: 0; padding: 0; background-color: #f4f4f4f4; font-family: Arial, sans-serif; text-align: center; display: flex; align-items: center; justify-content: center;">

  <table style="width: 80%; margin-top: 24px; margin: auto; background-color: #ffffff;">
    <tr>
      <td style="text-align: center; font-weight: bold; padding: 16px; display: flex; align-items: center; justify-content: center;">
        <!-- Contenedor principal con margen inferior y color de texto gris -->
        <div style="background-color: #f7f7f7; display: inline-block; width: 100%;">
          <img src="{{ asset('images/logo.png')}}" alt="Logo de la tienda" style="max-width: 250px;" />
        </div>
      </td>
    </tr>
    <tr style="margin: 0px 24px; display: flex;">
      <td style="text-align: left; padding: 16px;">
        <div>
          <p style="padding-top: 4px; font-size: 1.25rem;">Hola {{ $clientData['first_name'] }}.</p>
          <p style="padding-top: 4px; font-size: 1.25rem;">Gracias por descargarte el catálogo de este año. Puedes descargarlo desde <a href="https://drive.google.com/file/d/1XDgWmJXARPk95MIM8WB654Na2nYXCxhC/view?usp=drive_link">aquí</a>.</p>
          <p style="padding-top: 4px; font-size: 1.25rem;">En el Catálogo Productos Occidente encontraras toda la información que necesitas sobre nuestros productos.</p>
        </div>
      </td>
    </tr>
    <tr>
      <td style="text-align: center; padding: 16px;">
        <img src="{{ asset('images/portada_catalogo.png') }}" style="height: 80%" alt="">
      </td>
    </tr>
    <tr style="width: 80%; margin: auto; display: flex;">
      <td style="text-align: left; padding: 16px;">
        <div>
          <p style="padding: 0px 4px; font-size: 1.25rem;">Gracias por preferirnos.</p>
          <a href="https://drive.google.com/file/d/1XDgWmJXARPk95MIM8WB654Na2nYXCxhC/view?usp=drive_link" style="display: inline-block;
          padding: 10px 20px;
          background-color: #888;
          color: #fff;
          text-decoration: none;
          border-radius: 5px;
          font-size: 1.25rem;
          transition: background-color 0.3s ease;">Descarga nuestro catalogo.</a>
        </div>
      </td>
    </tr>
    <tr>
      <td style="background-color: #f7f7f7; text-align: center; font-weight: bold; padding: 16px;">
        <p style="font-size: 1rem;">Pegoccidente - Todos los derechos reservados &copy; desarrollado por Branar, C.A.</p>
      </td>
    </tr>
  </table>

</main>
