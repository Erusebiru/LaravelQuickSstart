<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Laravel Quickstart - Basic</title>
        <style>
            td{
                border: 1px solid black;
            }
            td form{
                display: inline;
            }

            .prueba{
                border: 1px solid black;
                width: 238px;
                height: 200px;
                display: flex;
                place-items: center;
                place-content: center;
               /* justify-content: center;
                align-items: center; */
            }
        </style>
        <!-- CSS And JavaScript -->
    </head>

    <body>
        <div class="container">
            <nav class="navbar navbar-default">
                <!-- Navbar Contents -->
            </nav>
        </div>
        
        @yield('content')
        
        <div class="prueba"> THE TASK LIST </div>
        
    </body>
</html>