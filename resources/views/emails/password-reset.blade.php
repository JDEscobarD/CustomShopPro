<!DOCTYPE html>
<html>

<head>
    <title>Restablecimiento de contraseña</title>
</head>

<body>
    <h1>Hola,</h1>
    <p>Recibimos una solicitud para restablecer tu contraseña.</p>
    <p>Tu código de verificación es:</p>
    <h2>{{ $token }}</h2>
    <p>Este código es válido durante una hora.</p>
    <p>Si no solicitaste este cambio, ignora este correo.</p>
</body>

</html>