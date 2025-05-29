<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Nuevo mensaje</title>
</head>

<body style="font-family: sans-serif; background: #f4f4f4; padding: 20px;">
    <h2>Has recibido un nuevo mensaje desde el formulario de contacto</h2>
    <p><strong>Nombre:</strong> {{ $data['name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Mensaje:</strong><br>{{ nl2br(e($data['message'])) }}</p>
    <p style="white-space: pre-wrap;">{{ $data['message'] }}</p>
</body>

</html>
