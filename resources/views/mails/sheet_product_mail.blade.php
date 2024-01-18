
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
            <p style="padding-top: 4px; font-size: 1.25rem;">Gracias por solicitar la ficha tecnica del producto {{ $product->name }}. Puedes descargarlo desde <a href="{{$product->url_sheet}}">aquí</a>.</p>
            <p style="padding-top: 4px; font-size: 1.25rem;">En esa ficha podras observar toda la informacion acerca de: </p>
            <ul>
              <li style="font-size: 1.25rem;">Descripción</li>
              <li style="font-size: 1.25rem;">Características</li>
              <li style="font-size: 1.25rem;">Usos</li>
              <li style="font-size: 1.25rem;">Datos Técnicos:</li>
              <li style="font-size: 1.25rem;">Preparación de la superficie</li>
              <li style="font-size: 1.25rem;">Preparación de la mezcla</li>
              <li style="font-size: 1.25rem;">Aplicación</li>
              <li style="font-size: 1.25rem;">Envasado</li>
              <li style="font-size: 1.25rem;">Almacenamiento</li>
              <li style="font-size: 1.25rem;">Vencimiento</li>
              <li style="font-size: 1.25rem;">Precauciones</li>
            </ul>
          </div>
        </td>
      </tr>
      <tr style="margin: auto; display: flex;">
        <td style="text-align: left; padding: 16px;">
          <div>
            <p style="padding: 0px 4px; font-size: 1.25rem;">Gracias por preferirnos.</p>
            <a href="{{$product->url_sheet}}" style="display: inline-block;
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
  