@php
$logo = get_logo();
@endphp

<img src="{{ asset('storage/' . ($logo ?: 'default-logo.png')) }}" alt="Our Logo" {{ $attributes->merge(['class' => 'h-9
w-auto']) }}>