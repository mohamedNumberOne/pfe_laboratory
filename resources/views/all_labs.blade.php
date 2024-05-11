<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('icones/all.css') }}">
    <title>tout les labo </title>
</head>

<body>




    <!-- Start header -->
    <header class="top-header">
        <nav class="navbar header-nav navbar-expand-lg">
            <div class="container">
                @if (Route::has('login'))
                @auth
                <a class="navbar-brand" href="/dashboard"><img src="images/logo.png" alt="image"></a>
                @endauth

                @endif
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd"
                    aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                    <ul class="navbar-nav">


                        @if (Route::has('login'))

                        @auth
                        <li> <a href="{{ url('/dashboard') }}" class="nav-link ">
                                Accueil
                            </a>
                        </li>
                        @else
                        <li> <a href="{{ route('login') }}" class="nav-link  ">
                                Se Connecter
                            </a>
                        </li>
                        @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}" class="nav-link  ">
                                S'inscrire
                            </a>
                        </li>
                        @endif
                        @endauth

                        @endif



                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- End header -->
 
    <h3 class="text-center mt-4 mb-4">
        Les laboratoires à proximité <span class="text-success"> <i class="fa-solid fa-vial-virus"></i> </span>
        @if ( isset( $all_labs ) ) <small> ( {{ count($all_labs) }} ) </small> @endif
    </h3>

    <hr>



    @if ( isset( $all_labs ) )


    {{-- style="background-image: url('images/6.jpg') ; background-size : contain; " --}}

    <div class=" d-flex justify-content-around flex-wrap ">

        @foreach ($all_labs as $labo)



        @if ( empty( $labo -> img ) )
        <?php $labo -> img   = asset('images/labo.jpg') ; ?>
        @else
        <?php $labo -> img   = asset('images/' . $labo -> img  ) ; ?>

        @endif



        <div class="card m-2" style="width: 18rem;  ">
            <img class="card-img-top" src="{{ $labo -> img }}" alt="Card image cap"  
            style="max-height: 200px !important ; min-height: 200px !important ; " >
            <div class="card-body">
                <h5 class="card-title">
                    <span class="text-primary"> <i class="fa-solid fa-flask-vial"></i> </span>
                    {{ $labo -> name }}
                </h5>
                <h6> {{ $labo -> commune_name }} </h6>

                <a href="/lab_info/{{ $labo -> id }}" class="btn btn-primary"> Voir les détails </a>
            </div>
        </div>

        @endforeach
    </div>
    @elseif (session() -> has('error') )

    <div class="alert alert-warning text-center container "> {{ session('error') }} </div>

    @endif

    <script src="{{ asset('icones/all.js') }}"></script>
</body>

</html>