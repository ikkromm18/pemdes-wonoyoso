<a
    {{ $attributes->merge(['href' => '#', 'class' => 'bg-red-600 py-3 px-4 rounded-md hover:bg-red-700 font-semibold']) }}>
    {{ $slot }}
</a>
