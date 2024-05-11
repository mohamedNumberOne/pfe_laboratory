<!-- Start header -->
<header class="top-header">
    <nav class="navbar header-nav navbar-expand-lg">
        <div class="container">
            @if (Route::has('login'))
                    @auth
                        <a class="navbar-brand" href="/dashboard"><img src="images/logo.png" alt="image"></a>
                    @endauth
            
                <a class="navbar-brand" href="/"><img src="images/logo.png" alt="image"></a>
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
<x-guest-layout>
    <x-authentication-card>
        <img src="images/logo.png" alt="image" class="mb-4  ">
        {{-- @include('.navigation-menu') --}}


        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="Nom" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus autocomplete="name" />
            </div>


            <div class="mt-4">
                <x-label for="pnom" value="Prénom" />
                <x-input id="pnom" class="block mt-1 w-full" type="text" name="pnom" :value="old('pnom')" required
                    autofocus autocomplete="pnom" />
            </div>


            <div class="mt-4">

                <x-label for="wilaya_id" value="Wilaya" />

                <select name="wilayas" id="wilaya_id" required
                    class="form-select border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">

                    <option> </option>

                    @foreach ($all_wilaya as $wilaya )

                    <option value="{{ $wilaya -> id }}">
                        {{ $wilaya -> name }} ( {{ $wilaya -> code }} )
                    </option>

                    @endforeach

                </select>

            </div>


            <div class="mt-4" id="all_communes">



            </div>


            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>






            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    Vous Aves déja un compte ?
                </a>

                <x-button class="ms-4">
                    Enregistrer
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>