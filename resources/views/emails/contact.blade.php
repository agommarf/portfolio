<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nuevo mensaje de contacto</title>
</head>
<body>
    <h2>Has recibido un mensaje</h2>

    <p><strong>Nombre:</strong> {{ $data['name'] ?? '—' }}</p>
    <p><strong>Email:</strong> {{ $data['email'] ?? '—' }}</p>
    <p><strong>Mensaje:</strong><br>{{ $data['message'] ?? '—' }}</p>
</body>
</html>