@props([
    'ad' => null
])

<x-auth-validation-errors class="mb-4" />

<h3>{{ __('Reageer op deze advertentie') }}</h3>
<p class="text-sm text-gray-500 my-4">
    {{ __('interested send message', ['name'=>$ad->user->name]) }}
</p>
<form id="contact" action="{{ route('ads.contact', $ad) }}" method="POST" class="grid grid-cols-1 gap-y-6">
    @csrf
    <div>
        <label for="full-name" class="sr-only">{{ __('Full name') }}</label>
        <x-input.text
            id="name"
            type="text"
            name="name"
            autocomplete="name"
            placeholder="{{ __('Full name') }}"
            value="{{ old('name') }}"
        />
    </div>
    <div>
        <label for="email" class="sr-only">{{ __('Email') }}</label>
        <x-input.text
            id="email"
            name="email"
            type="email"
            autocomplete="email"
            placeholder="{{ __('Email') }}"
            value="{{ old('email') }}"
        />
    </div>
    <div>
        <label for="phone" class="sr-only">{{ __('Phone') }}</label>
        <x-input.text
            id="phone"
            type="text"
            name="phone"
            autocomplete="tel"
            placeholder="{{ __('Phone') }}"
            value="{{ old('phone') }}"
        />
    </div>
    <div>
        <label for="message" class="sr-only">{{ __('Message') }}</label>
        <x-input.textarea
            id="message"
            name="message"
            rows="4"
            placeholder="{{ __('Message') }}"
        >{{ old('message') }}</x-textarea>
    </div>
    <div>
        <x-button>
            {{ __('Contact') }}
        </x-button>
    </div>
</form>
