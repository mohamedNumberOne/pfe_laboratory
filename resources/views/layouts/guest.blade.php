<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>



    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

</head>

<body>
    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>

    @livewireScripts
    <script src=" {{ asset('js/jquery.min.js') }} "></script>
    <script src=" {{ asset('js/bootstrap.min.js') }} "></script>
    <script>
        var wilaya_id =  document.getElementById('wilaya_id')   ;

        wilaya_id.onchange = function () {

            all_communes.innerHTML =  "un instant ..." ;
            

            $.ajax({
            url: "/get_all_communes/" +  wilaya_id.value ,
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                wilaya_id: wilaya_id.value // Passer le paramètre
            },
            success: function(response) {
                // Traitement en cas de succès de la requête
                all_communes.innerHTML = response ;
               
            },
            error: function(xhr, status, error) {
                all_communes.innerHTML = "erreur !!" ;

            }
        });

        }

      
    </script>



</body>

</html>
