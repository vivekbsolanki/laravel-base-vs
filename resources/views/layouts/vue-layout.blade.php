<!doctype html>
    <html lang="{{ app()->getLocale() }}">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <!-- scripts -->
            <script src="http://code.jquery.com/jquery.js"></script>

            <title>Outlet for SPA</title>
            <!-- styles -->
            <link rel="stylesheet" type="text/css" href="css/app.css">            
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

        </head>
        <body>
            <main class="py-4">
                @yield('content')
                @stack('listing-scripts')                
            </main>
        </body>
    </html>