<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambio de contraseña</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 50px 12px 12px 12px; padding: 0; text-align: center;">
    <table width="100%" cellpadding="0" cellspacing="0" style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">        
        <tr>
            <td style="background-color: #0469FF; padding: 30px; text-align: center;">
                <h1 style="color: #ffffff; margin: 0; font-size: 24px;">Cambio de contraseña</h1>
            </td>
        </tr>
        <tr>
            <td style="padding: 15px; text-align: center;">
                <p style="color: #333333; font-size: 16px; margin: 0 0 15px 0;">Recibimos una solicitud para restablecer tu contraseña.</p>
                <p style="color: #333333; font-size: 16px; margin: 0 0 15px 0;">Tu código de verificación es:</p>
                <h2 style="color: #0469FF; font-size: 32px; margin: 0 0 15px 0;">{{ $token }}</h2>
                <p style="color: #333333; font-size: 16px; margin: 0 0 15px 0;">Este código es válido durante una hora.</p>
                <p style="color: #777777; font-size: 14px; margin: 0;">Si no solicitaste este cambio, ignora este correo.</p>
            </td>
        </tr>
    </table>
</body>

</html>