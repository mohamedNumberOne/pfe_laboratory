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

        <x-validation-errors class="mb-4" />

        @session('status')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ $value }}
        </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="/register">
                    Créer un compte
                </a>
                @endif

                <x-button class="ms-4">
                    Se connecter
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>