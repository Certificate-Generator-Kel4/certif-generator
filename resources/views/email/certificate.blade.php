<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $certificate->event->name }}</title>
</head>
<body>
    <h1>Hello {{ $participant->nama }}</h1>
    <p>Congratulations! You have successfully completed the event {{ $certificate->event->name }}.</p>
    <p>Your certificate is attached to this email. Please download it and keep it for your records.</p>
    <p>Best regards,<br>{{ $certificate->event->name }}</p>
</body>
</html>