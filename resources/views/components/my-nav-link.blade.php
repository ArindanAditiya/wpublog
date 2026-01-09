@props(["href", "current" => false, "ariaCurrent" => false])

@php
    // $classes = $current ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-white/5 hover:text-white"
    if($current){
        $classes = "bg-gray-900 text-white";
        $ariaCurrent = "page";
    } else {
        $classes = "text-gray-300 hover:bg-white/5 hover:text-white";
    } 
@endphp

<a href="{{ $href }}" 
{{ $attributes->merge(["class" => "block rounded-md px-3 py-2 text-base font-medium " . $classes, "aria-current" => $ariaCurrent]) }}>
    {{ $slot }}
</a>