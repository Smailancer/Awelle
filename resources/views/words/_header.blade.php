<header class="w-full mx-0 py-4 text-center mt-5">
    {{-- <div class="max-w-screen-md mx-auto mt-auto mb-10">
        <!-- Move this div to the center -->
        <div style="width: 400px; height: 100px; margin: 0; padding: 0;" data-wordart-src="//cdn.wordart.com/json/vyccgq8ey7q8"></div>
    </div> --}}

    <h1 class="mb-4 text-6xl font-extrabold text-yellow-300 dark:text-white md:text-6xl lg:text-8xl"> AWELLE </h1>
    <p class="text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">The First Tamazight Variables Digital Dictionary.</p>

    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">
        <div class="relative lg:inline-flex bg-gray-100 rounded-xl">
            <x-slang-dropdown />
        </div>

        <!-- Search -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="/">
                @if (request('slang'))
                    <input type="hidden" name="slang" value="{{ request('slang') }}">
                @endif

                <input type="text"
                       name="search"
                       placeholder="Find a word"
                       class="bg-transparent placeholder-grey font-semibold text-sm"
                       value="{{ request('search') }}"
                >
            </form>
        </div>
    </div>
</header>
