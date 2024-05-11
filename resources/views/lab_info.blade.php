<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('icones/all.css') }}">

    <title>info labo</title>
</head>

<body>




    <!-- Start header -->
    <header class="top-header">
        <nav class="navbar header-nav navbar-expand-lg">
            <div class="container">
                @if (Route::has('login'))
                @auth
                <a class="navbar-brand" href="/dashboard"><img src="{{ asset('images/logo.png') }}" alt="image"></a>
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


    @if ( ! isset( $error ) )


    <h3 class="text-center mt-4 mb-4">
        Détails de :
        <mark> {{ $info_lab -> name }} </mark> <span class="text-success"> <i class="fa-solid fa-vial-virus"></i>
        </span>
    </h3>


    <hr>


    @if ( isset( $info_lab ) )


    {{-- style="background-image: url('images/6.jpg') ; background-size : contain; " --}}

    <div class="    mt-5 container ">

        <div class="row">

            <div class="col-md-6 col-sm-12">
                <i class="fa-solid fa-map-pin"></i>
                {{ $info_wilaya -> name }}, {{ $info_commune -> name }}, {{ $info_lab-> adresse }}
                <br>
                @if ( empty( $info_lab -> phone ) )
                <?php  $info_lab -> phone = "0..." ;  ?>
                @endif
                <i class="fa-solid fa-phone-volume"></i> {{ $info_lab -> phone }} <br>

                <hr>

                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active">
                        Liste des analyses disponibles
                    </a>
                    @if ( count( $analyses ) > 0 )
                    @foreach ($analyses as $analyse)

                    <a href="#" class="list-group-item list-group-item-action">
                        {{ $analyse -> analyses_name }} | {{ $analyse -> prix }} DA </a>

                    @endforeach
                    @else
                    <a href="#" class="list-group-item list-group-item-action bg-warning text-white ">    pas d'analyses pour l'instant   </a>
                    
                    @endif


                </div>
            </div>

            <div class="col-md-6  col-sm-12  mt-sm-3 ">

                @if ( empty( $info_lab -> img ) )
                <?php $info_lab -> img   = asset('images/labo.jpg') ; ?>
                @else
                <?php $info_lab -> img   = asset('images/' . $info_lab -> img  ) ; ?>
                @endif


                <img class=" w-100 " src="{{ $info_lab -> img }}" alt="  image  ">

            </div>

        </div>

    </div>

    @endif


    @else

    <div class="alert alert-warning text-center container    "> {{ session('error') }} </div>

    @endif

    <script src="{{ asset('icones/all.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

</body>

</html>