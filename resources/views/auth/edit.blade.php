<x-layout>



    <div class="flex flex-col items-center pt-6 mt-10 sm:justify-between sm:pt-0">
        <h1>{{ __('Profile') }}</h1>
        <div class="w-full px-6 py-4 mt-6 mb-10 overflow-hidden bg-white shadow-md sm:max-w-4xl sm:rounded-lg">

            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('admin.profile.update') }}">
            @method('PUT')

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            @csrf

            <div class="lg:grid lg:grid-cols-2 lg:gap-4">
                <div>
                    <h2>{{ __('Data') }}</h2>
                    <p class="my-3 text-sm text-gray-500">{{ __('Please tell us how you want people to contact you')}}</p>

                    <!-- Name -->
                    <div class="mb-6">
                        <x-label for="name" required="required" :value="__('Name')" />
                        <x-input id="name" required="required" type="text" name="name"
                            :value="old('name', auth()->user()->name)" required autofocus />
                    </div>

                    <!-- Email Address -->
                    <div class="mb-6">
                        <x-label for="email" required="required" :value="__('Email')" />
                        <x-input id="email" required="required" type="email" name="email"
                            :value="old('email', auth()->user()->email)" required autofocus />
                    </div>

                    <!-- Name -->
                    <div class="mb-6">
                        <x-label for="phone" :value="__('Phone')" />
                        <x-input id="phone" type="text" name="phone"
                            :value="old('phone', auth()->user()->phone)" autofocus />
                    </div>
                </div>
                <div>
                    <div>

                        <h2>{{ __('Settings') }}</h2>
                        <p class="my-3 text-sm text-gray-500">{{ __('Please tell us how you want people to contact you')}}</p>

                        <div class="pt-6 sm:pt-5">
                            <div role="group" aria-labelledby="label-email">
                                <div class="mt-4 sm:mt-0 sm:col-span-2">
                                    <div class="max-w-lg space-y-4">
                                        <div class="relative flex items-start">
                                            <div class="flex items-center h-5">
                                                <input id="show_phone" name="show_phone" type="checkbox" value="1"
                                                    class="w-4 h-4 border-gray-300 rounded text-blue focus:ring-blue"
                                                    @if(old('show_phone') || auth()->user()->show_phone) checked @endif>
                                            </div>
                                            <div class="ml-3 text-sm">
                                                <label for="show_phone" class="font-medium text-gray-700">{{ __('Phone')
                                                    }}</label>
                                                <p class="text-gray-500">{{ __('Show my phone number on the website')}}</p>
                                            </div>
                                        </div>

                                        <div class="relative flex items-start">
                                            <div class="flex items-center h-5">
                                                <input id="show_email" name="show_email" type="checkbox" value="1"
                                                    class="w-4 h-4 border-gray-300 rounded text-blue focus:ring-blue"
                                                    @if(old('show_email') || auth()->user()->show_email) checked @endif>
                                            </div>
                                            <div class="ml-3 text-sm">
                                                <label for="show_email" class="font-medium text-gray-700">{{ __('Email')
                                                    }}</label>
                                                <p class="text-gray-500">{{ __('Show my email address on the website')}}</p>
                                            </div>
                                        </div>

                                        <div class="relative flex items-start">
                                            <div class="flex items-center h-5">
                                                <input id="show_full_address" name="show_full_address" type="checkbox"
                                                    value="1"
                                                    class="w-4 h-4 border-gray-300 rounded text-blue focus:ring-blue"
                                                    @if(old('show_full_address') || auth()->user()->show_full_address) checked @endif>
                                            </div>
                                            <div class="ml-3 text-sm">
                                                <label for="show_full_address" class="font-medium text-gray-700">{{
                                                    __('Address') }}</label>
                                                <p class="text-gray-500">{{ __('Show my address on the website')}}</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="pt-8 space-y-6 divide-y divide-gray-200 sm:pt-10 sm:space-y-5">
                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-3">
                        {{ __('Edit') }}
                    </x-button>
                </div>
        </form>
        </div>
    </div>

</x-layout>
