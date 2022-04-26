@props([
    'ads' => null,
])

@if ($ads->count() > 1)
    <x-info-window.multiple :ads="$ads"></x-info-windows.multiple>
@else
    <x-info-window.single :ad="$ads->first()"></x-info-window.single>
@endif
