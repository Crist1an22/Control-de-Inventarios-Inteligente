<x-guest-layout>

    {{-- FUENTES + CSS --}}
    @push('styles')
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;700&display=swap" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
    @endpush

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <section class="login-wrapper">

        <section class="form-container">

            <h1>Iniciar Sesión</h1>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-4">

                    <x-input-label for="email" :value="__('Email')" />

                    <x-text-input
                        id="email"
                        class="block mt-2 w-full"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus
                        autocomplete="username"
                    />

                    <x-input-error
                        :messages="$errors->get('email')"
                        class="mt-2"
                    />

                </div>

                <!-- Password -->
                <div class="mt-4">

                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input
                        id="password"
                        class="block mt-2 w-full"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                    />

                    <x-input-error
                        :messages="$errors->get('password')"
                        class="mt-2"
                    />

                </div>

                <!-- Remember -->
                <div class="block mt-4 text-start">

                    <label for="remember_me" class="inline-flex items-center">

                        <input
                            id="remember_me"
                            type="checkbox"
                            class="rounded border-gray-300"
                            name="remember"
                        >

                        <span class="ms-2 text-sm remember-text">
                            {{ __('Remember me') }}
                        </span>

                    </label>

                </div>

                <!-- Recuperar contraseña -->
                <div class="mt-4 text-center">

                    @if (Route::has('password.request'))

                        <a
                            class="login-link"
                            href="{{ route('password.request') }}"
                        >
                            {{ __('Forgot your password?') }}
                        </a>

                    @endif

                </div>

                <!-- Botón -->
                <div class="mt-4">

                    <x-primary-button class="w-full justify-center login-btn">
                        {{ __('Log in') }}
                    </x-primary-button>

                </div>

            </form>

        </section>

    </section>

</x-guest-layout>