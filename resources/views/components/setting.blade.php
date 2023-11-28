@props(['heading'])

<section class="py-8 max-w-4xl mx-auto">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b">
        {{ $heading }}
    </h1>

    <div class="flex">
        @admin
        {{-- <aside class="w-48 flex-shrink-0">
            <h4 class="font-semibold mb-4">Links</h4>

            <ul>
                <li>
                    <a href="/admin/words" class="{{ request()->is('admin/words') ? 'text-blue-500' : '' }}">All words</a>
                </li>

                <li>
                    <a href="/admin/words/create" class="{{ request()->is('admin/words/create') ? 'text-blue-500' : '' }}">New word</a>
                </li>
            </ul>
        </aside> --}}
        @endadmin
        <main class="flex-1">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>
