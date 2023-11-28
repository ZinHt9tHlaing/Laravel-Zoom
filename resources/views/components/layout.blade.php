<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/style.css">
</head>

<body id="home">

    <!-- navbar -->
    <x-navbar />

    @if (session()->has('message'))
        <div class="alert alert-secondary" role="alert">
            {{ session()->get('message') }}
        </div>
    @endif

    {{ $slot }}

    <!-- footer -->
    <x-footer />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
