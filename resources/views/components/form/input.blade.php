@props(['name'])

<x-form.field>
    <x-form.label name="{{ $name === 'slug' ? 'Pronunciation' : $name }}"/>


<label for="helper-text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">The Term</label>

    <input class="border border-gray-200 p-2 w-full rounded"
           name="{{ $name }}"
           id="{{ $name }}"
           {{ $attributes(['value' => old($name)]) }}
    >

    <x-form.error name="{{ $name }}"/>
</x-form.field>
