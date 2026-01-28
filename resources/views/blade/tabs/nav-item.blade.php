@props([
    'name' => null,
    'label' => null,
    'count' => 0,
    'icon' => null,
    'icon_style' => null,
    'tooltip' => null,
])
<!-- start tab nav item -->
<li {{ $attributes->merge(['class' => '']) }}>

    <a href="#{{ $name ?? 'info' }}" data-toggle="tab" data-tooltip="true" title="{{ $tooltip ?? $label }}">

        @if ($icon)

            <span class="hidden-lg hidden-md">
                 <i class="{{ $icon }}" style="font-size: 18px" aria-hidden="true"></i>
            </span>

            <span class="hidden-xs hidden-sm">
                 <i class="{{ $icon }}" style="font-size: 16px" aria-hidden="true"></i>
            </span>

            <span class="sr-only">
            {{ $label }}
        </span>

        @elseif ($label)
            {{ $label }}
        @endif

        @if ($count > 0)
            <span class="badge">{{ number_format($count) }}</span>
        @endif

    </a>
</li>
<!-- end tab nav item -->