@props([
    'ads' => null,
])

@if ($ads->count() > 1)
    <x-marker.multiple :ads="$ads"></x-marker.multiple>
@else
    <x-marker.single :ad="$ads->first()"></x-marker.single>
@endif
