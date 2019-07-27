<!doctype html>
    <html lang="{{ app()->getLocale() }}">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="csrf-token" content="{{ csrf_token() }}">

            <title>Outlet for SPA</title>
            <link rel="stylesheet" type="text/css" href="css/app.css">            
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

        </head>
        <body>
            <div class="container" id="listing-id">                
                <listing></listing>
            </div>
            <script src="http://code.jquery.com/jquery.js"></script>
            <script type="text/javascript" src="js/assets/js/vuelisting.js"></script>
        </body>
    </html>