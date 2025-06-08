<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"> <!-- Codificación de caracteres -->
    <title>Nuevo mensaje de contacto</title> <!-- Título del email -->
</head>

<body>
    <h2>Has recibido un mensaje</h2> <!-- Título principal del mensaje -->

    <!-- Mostrar nombre del remitente, o un guion si no hay -->
    <p><strong>Nombre:</strong> {{ $data['name'] ?? '—' }}</p>

    <!-- Mostrar email del remitente, o un guion si no hay -->
    <p><strong>Email:</strong> {{ $data['email'] ?? '—' }}</p>

    <!-- Mostrar mensaje recibido, o un guion si no hay -->
    <p><strong>Mensaje:</strong><br>{{ $data['message'] ?? '—' }}</p>
</body>

</html>
