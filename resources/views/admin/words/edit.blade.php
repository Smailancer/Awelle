<x-layout>
    <x-setting :heading="'Edit Post: ' . $word->term">
        <form method="POST" action="/admin/words/{{ $word->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="term" :value="old('term', $word->term)" required />
            <x-form.input name="slug" :value="old('slug', $word->slug)" required />

            {{-- <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $word->thumbnail)" />
                </div>

                <img src="{{ asset('storage/' . $word->thumbnail) }}" alt="" class="rounded-xl ml-6" width="100">
            </div> --}}

            <x-form.textarea name="meaning" required>{{ old('meaning', $word->meaning) }}</x-form.textarea>
            <x-form.textarea name="exemple" required>{{ old('exemple', $word->exemple) }}</x-form.textarea>

            <x-form.field>
                <x-form.label name="slang"/>

                <select name="slang_id" id="slang_id" required>
                    @foreach (\App\Models\Slang::all() as $slang)
                        <option
                            value="{{ $slang->id }}"
                            {{ old('slang_id', $word->slang_id) == $slang->id ? 'selected' : '' }}
                        >{{ ucwords($slang->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="slang"/>
            </x-form.field>

            <x-form.button>Update</x-form.button>
        </form>
    </x-setting>
</x-layout>
