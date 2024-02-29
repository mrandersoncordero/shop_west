<main style="margin: 0; padding: 0; background-color: #f4f4f4; font-family: Arial, sans-serif; text-align: center; display: flex; align-items: center; justify-content: center;">

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
                    <p style="padding-top: 4px; font-size: 1.25rem;">Hola {{ $clientData['complete_name'] }},</p>
                    <p style="font-size: 1.25rem;">Gracias por ponerte en contacto con nosotros. Hemos recibido tu mensaje y nos pondremos en contacto contigo lo antes posible.</p>
                    <p style="font-size: 1.25rem;">Detalles de tu mensaje:</p>
                    <ul>
                        <li style="font-size: 1.25rem;"><strong>Email:</strong> {{ $clientData['email'] }}</li>
                        <li style="font-size: 1.25rem;"><strong>Teléfono:</strong> {{ $clientData['phone_number'] ?? 'No proporcionado' }}</li>
                        <li style="font-size: 1.25rem;"><strong>Zona:</strong> {{ $clientData['zone'] ?? 'No proporcionado' }}</li>
                        <li style="font-size: 1.25rem;"><strong>Asunto:</strong> {{ $clientData['subject'] ?? 'No proporcionado' }}</li>
                        <li style="font-size: 1.25rem;"><strong>Comentario:</strong> {{ $clientData['comment'] ?? 'No proporcionado' }}</li>
                    </ul>
                    <p style="font-size: 1.25rem;">Saludos,</p>
                    <p style="font-size: 1.25rem;">Productos Occidente, C.A.</p>
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
