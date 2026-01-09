@props(["href", "categorySlug"])

@php
    switch ($categorySlug) {
        case 'web-design':
            $bgColor = "bg-teal-500";
            break;
        case 'web-programming':
            $bgColor = "bg-gray-500";
            break;
        case 'AI':
            $bgColor = "bg-yellow-500";
            break;
        case 'berita-penting':
            $bgColor = "bg-indigo-500";
            break;
        default:
            $bgColor = "bg-white";
            break;
    }
@endphp

<a href="{{ $href }}" 
    {{ $attributes->merge(["class" => "my-1 bg-primary-100 text-white text-xs font-medium px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800 " . $bgColor
    ])}}> 
    {{ $slot }}
</a>