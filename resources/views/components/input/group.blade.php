@props([
    'name' => '',
    'label' => '',
    'required' => false,
    'error' => null
])


<div {{ $attributes->class(['sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5']) }}>
    @if ($label)
        <label for="title" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
            {{ $label }}
            @if ($required)
                <span>*</span>
            @endif
        </label>
    @endif
    <div class="mt-1 sm:mt-0 sm:col-span-2">
        {{ $slot }}
        @if ($errors->has($name))
            <small class="mt-1 italic text-red-600">{{ $errors->first($name) }}</small>
        @endif
    </div>
</div>
