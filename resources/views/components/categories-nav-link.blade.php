@props(['active'])

@php
    // dd($active);
    $classes = ($active ?? false) ?
        "inline-block px-4 py-3 text-white bg-blue-600 rounded-lg active" :
        "inline-block px-4 py-3 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white" 
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>