@props([
    'ad' => null
])

<x-auth-validation-errors class="mb-4" />

<form id="contact" action="{{ route('ads.contact', $ad) }}" method="POST" class="grid grid-cols-1 gap-y-6">
    @csrf
    <div>
        <label for="full-name" class="sr-only">{{ __('Full name') }}</label>
        <input
            id="name"
            type="text"
            name="name"
            autocomplete="name"
            class="block w-full px-4 py-3 placeholder-gray-500 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            placeholder="{{ __('Full name') }}"
            value="{{ old('name') ?: 'kylian' }}"
        >
    </div>
    <div>
        <label for="email" class="sr-only">{{ __('Email') }}</label>
        <input
            id="email"
            name="email"
            type="email"
            autocomplete="email"
            class="block w-full px-4 py-3 placeholder-gray-500 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            placeholder="{{ __('Email') }}"
            value="{{ old('email') ?: 'kylian@kobaltdigital.nl' }}"
        >
    </div>
    <div>
        <label for="phone" class="sr-only">{{ __('Phone') }}</label>
        <input
            id="phone"
            type="text"
            name="phone"
            autocomplete="tel"
            class="block w-full px-4 py-3 placeholder-gray-500 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            placeholder="{{ __('Phone') }}"
            value="{{ old('phone') ?: '0629362877' }}"
        >
    </div>
    <div>
        <label for="message" class="sr-only">{{ __('Message') }}</label>
        <textarea
            id="message"
            name="message"
            rows="4"
            class="block w-full px-4 py-3 placeholder-gray-500 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
            placeholder="{{ __('Message') }}"
        >{{ old('message') ?: 'Ik wil!' }}</textarea>
    </div>
    <div>
        <button
            class="inline-flex justify-center px-6 py-3 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        >
            {{ __('Submit') }}
        </button>
    </div>
</form>
