<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
      
        .content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #000;
        }
        .name {
            font-size: 32px;
            font-weight: bold;
            margin: 10px 0;
        }
        .message {
            font-size: 18px;
        }
    </style>
</head>
<body>
<div class="certificate">
    <div style="position: relative; width: 100%; height: 100vh;">
        <img src="{{ public_path('images/bg.jpg') }}" style="width: 100%; height: 100vh; position: absolute; z-index: -1; object-fit: cover;">
        <div class="content">
            <h1>Certificate of Achievement</h1>
            <p class="name">{{ $participant->nama }}</p>
            <p class="message">Congratulations on your accomplishment!</p>
        </div>
    </div>
</body>
</html>
