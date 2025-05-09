<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-6">
            <h1 class="text-center text-4xl font-extrabold text-blue-700 mb-4 animate-bounce">Gaza Store</h1>
            <p class="text-center text-gray-500 animate-fade-in">Log in to access your account</p>
        </div>

        <style>
            body {
            background: linear-gradient(to right, #1e3a5f, #3b82f6);
            font-family: 'Arial', sans-serif;
            color: #1e2230;
            }

            @keyframes fade-in {
                0% {
                    opacity: 0;
                }
                100% {
                    opacity: 1;
                }
            }

            .animate-fade-in {
                animation: fade-in 1s ease-in-out;
            }

            @keyframes bounce {
                0%, 20%, 50%, 80%, 100% {
                    transform: translateY(0);
                }
                40% {
                    transform: translateY(-30px);
                }
                60% {
                    transform: translateY(-15px);
                }
            }

            .animate-bounce {
                animation: bounce 2s infinite;
            }

            .form-container {
                background: #ffffff;
                padding: 2rem;
                border-radius: 10px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                max-width: 400px;
                margin: 2rem auto;
            }

            .btn-primary {
                background-color: #4facfe;
                color: white;
                padding: 0.75rem 1.5rem;
                border-radius: 5px;
                font-weight: bold;
                text-transform: uppercase;
                transition: background-color 0.3s ease;
            }

            .btn-primary:hover {
                background-color: #00c6ff;
            }

            .btn-primary:focus {
                outline: none;
                box-shadow: 0 0 0 3px rgba(79, 172, 254, 0.5);
            }
        </style>

        <body>

        <div class="form-container">
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <button type="submit" class="btn-primary ms-3">
                    {{ __('Log in') }}
                </button>
            </div>
        </div>
    </form>
</body>
</x-guest-layout>
