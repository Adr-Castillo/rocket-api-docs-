<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <!-- resources/views/welcome.blade.php -->

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel Project</title>
  @vite('resources/css/app.css')
</head>
    <!-- resources/views/welcome.blade.php -->
<!-- remove the class from the body tag -->
<body>
  <div id="app"></div>
  @vite('resources/js/app.js')
</body>
</html>
