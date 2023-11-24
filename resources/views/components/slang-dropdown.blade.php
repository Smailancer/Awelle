

<x-dropdown1>
    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
            {{ isset($currentSlang) ? ucwords($currentSlang->name) : 'Slangs' }}

            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;"/>
        </button>
    </x-slot>

    <x-dropdown-item
        href="/?{{ http_build_query(request()->except('slang', 'page')) }}"
        :active="request()->routeIs('home') && is_null(request()->getQueryString())"
    >
        All
    </x-dropdown-item>

    @foreach ($slangs as $slang)

        <x-dropdown-item

            href="/?slang={{ $slang->name }}&{{ http_build_query(request()->except('slang', 'page')) }}"
            :active='request()->fullUrlIs("*?slang={$slang->name}*")'>

            {{ ucwords($slang->name) }}

        </x-dropdown-item>

    @endforeach

</x-dropdown1>
