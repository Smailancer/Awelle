<x-layout>
    <x-setting heading="Publish New Word">
        <form method="POST" action="/admin/words" enctype="multipart/form-data">
            @csrf

            <x-form.input name="term" required />
            <x-form.input name="slug" required />
            {{-- <x-form.input name="thumbnail" type="file" required /> --}}
            <x-form.textarea name="meaning" required />
            <x-form.textarea name="exemple" required />

            <x-form.field>
                <x-form.label name="slang"/>

                <select name="slang_id" id="slang_id" required>
                    @foreach (\App\Models\Slang::all() as $slang)
                        <option
                            value="{{ $slang->id }}"
                            {{ old('slang_id') == $slang->id ? 'selected' : '' }}
                        >{{ ucwords($slang->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="slang"/>
            </x-form.field>

            <x-form.button>Publish</x-form.button>
        </form>
    </x-setting>
</x-layout>
