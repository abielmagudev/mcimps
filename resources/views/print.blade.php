<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} | Impresión</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        print-color-adjust: exact;
        -webkit-print-color-adjust: exact; /* Para mayor compatibilidad */
    }
</style>
<body>
    @yield('content')

    <script>
        // 1. Lanzamos la impresión automáticamente al cargar la página
        window.onload = function() {
            window.print();
        };

        // 2. Escuchamos cuando termina el proceso de impresión
        window.onafterprint = function() {
            // 3. Cerramos la pestaña automáticamente
            window.close();
        };
    </script>
</body>
</html>
