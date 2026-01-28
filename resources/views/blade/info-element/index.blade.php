@props([
    'icon' => null,
    'icon_type' => null,
])

@if (!$slot->isEmpty())
    <li {{ $attributes->merge(['class' => 'list-group-item']) }}>
        @if ($icon_type)
            <x-icon type="{{ $icon_type }}" class="fa-fw" />
        @elseif ($icon)
           <i class="{{ $icon }}"></i>
        @endif
        {{ $slot }}
    </li>
@endif