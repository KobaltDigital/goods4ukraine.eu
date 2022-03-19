<x-layout>
    <x-auth-card>

        <h1 class="mb-4">{{ __("Login") }}</h1>

        <form method="POST" action="{{ route('login') }}">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email"  required="required" :value="__('Email')" />

                <x-input.text id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" required="required" :value="__('Password')" />

                <x-input.text id="password" required="required" class="block w-full mt-1"
                                type="password"
                                name="password"
                                autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="border-gray-300 rounded shadow-sm text-blue focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-black">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="text-sm hover:underline text-blue hover:text-blue" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-layout>
