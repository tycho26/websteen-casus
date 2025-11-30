<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{env('APP_NAME')}}</title>
    <link rel="stylesheet" href="/bootstrap/bootstrap.min.css">
</head>

<body>
    <div class=container>
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom"> 
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <span class="fs-4">Websteen casus</span> 
            </a>
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="/admin" class="nav-link">Admin paneel</a></li>
            </ul>
        </header>
        @yield('content')
    </div>


    <script src="/bootstrap/bootstrap.min.js"></script>
</body>

</html>