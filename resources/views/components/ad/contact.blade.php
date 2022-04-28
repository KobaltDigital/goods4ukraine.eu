@props([
    'ad' => null
])

<x-auth-validation-errors class="mb-4" />

<h3>{{ __('Get in touch') }}</h3>
<p class="text-sm text-gray-500 my-4">
    {{ __('interested send message', ['name'=>$ad->user->name]) }}
</p>
<form id="contact" action="{{ route('ads.contact', $ad) }}" method="POST" class="grid grid-cols-1 gap-y-6">
    @csrf
    <div>
        <x-label for="name" required>{{ __('Full name') }}</x-label>
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
        <x-label for="email" required>{{ __('Email') }}</x-label>
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
        <x-label for="phone">{{ __('Phone') }}</x-label>
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
        <x-label for="message" required>{{ __('Message') }}</x-label>
        <x-input.textarea
            id="message"
            name="message"
            rows="4"
            placeholder="{{ __('Message') }}"
        >{{ old('message') }}</x-input.textarea>
    </div>
    <div>
        <x-button onclick="this.disabled=true;this.value='Sending, please wait...';this.form.submit();">
            {{ __('Contact') }}
        </x-button>
    </div>
</form>
