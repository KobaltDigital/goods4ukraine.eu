@aware(['name'])

@props([
  'options' => null,
  'optionGroups' => false,
  'placeholder' => null,
  'value' => '',
  'disabled' => []
])

<div class="relative w-full select shadow-input">
  <select
    name="{{ $name }}"
    {{ $attributes->class(['block w-full max-w-lg border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm']) }}>
    @if ($placeholder)
      <option value="" {{ $value == null || $value == '' ? 'selected' : '' }}>{{ $placeholder }}</option>
    @endif
    @if ($optionGroups)
        @foreach ($options as $groupLabel => $groupOptions)
            @if (count($groupOptions) > 0)
                <optgroup label="{{$groupLabel}}">
                    @foreach ($groupOptions as $option => $label)
                        <option value="{{ $option }}" {{ in_array($option, $disabled) ? 'disabled' : '' }} {{ $option == $value ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </optgroup>
            @endif
        @endforeach
    @else
        @foreach ($options as $option => $label)
            <option value="{{ $option }}" {{ in_array($option, $disabled) ? 'disabled' : '' }} {{ $option == $value ? 'selected' : '' }}>{{ $label }}</option>
        @endforeach
    @endif
  </select>
</div>
