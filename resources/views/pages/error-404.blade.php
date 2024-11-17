<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error 404</title>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
</head>

<body>
    <main class="container">
        <section class="section mt-4">
            <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
                <h1>404</h1>
                <h2>The page you are looking for doesn't exist.</h2>
                <a class="btn btn-secondary btn-sm" href="{{ route('dashboard') }}">Back to home</a>
                <img src="{{ asset('assets/img/not-found.svg') }}" class="img-fluid py-5" alt="Page Not Found">
            </section>
        </section>
    </main>
</body>

</html>
