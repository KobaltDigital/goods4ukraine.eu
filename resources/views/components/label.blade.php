@props(['value','required'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-black']) }}>
    {{ $value ?? $slot }}
    {!! ($required ?? false) ? '<span class="text-red-800">*</span>' : '' !!}
</label>
