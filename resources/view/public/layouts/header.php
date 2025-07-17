<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ANKANVALL</title>
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/resources/css/main_style.css">
</head>
<body>
  <header>
 
    <div class="logo">KASANE</div>
    <nav>
      <a href="/">Inicio</a>
      <a href="/services">Servicios</a>
      <a href="/api_rivals">Rivals</a>
      <a href="/contacts">Contacto</a>
      
      <a><?=$_SESSION['active_user']['username'] ?? 'invitado'?></a>
    </nav>
  </header>