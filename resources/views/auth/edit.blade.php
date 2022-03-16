<x-layout>
    <x-auth-card>
        <form method="POST" action="{{ route('admin.profile.update') }}">
            @method('PUT')

            <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', auth()->user()->email)" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-3">
                    {{ __('Edit') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-layout>
