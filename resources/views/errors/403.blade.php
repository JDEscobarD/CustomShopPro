<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error - 403</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
</head>

<body>

    <div class="container error403">
        <div class="row">
            <div class="col-lg-6 text-center mx-auto">
                <h2>4<img src="{{ asset('assets/media/images/padlock.png') }}" alt="">3</h2>
                <p>Lo sentimos, no tienes permiso para acceder a esta página.</p>

                <a href="{{ route('dashboard') }}" class="btn btn-primary mt-4 px-4">Volver al inicio</a>
            </div>
        </div>
    </div>

</body>

</html>