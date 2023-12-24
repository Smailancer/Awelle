<x-app-layout>
    <x-setting :heading="'Edit '">

            <section class="bg-white dark:bg-gray-900">
                <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
                    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
                        Edit the word
                        <span class="text-yellow-400">{{$word->term}}</span>
                    </h2>                    <form method="POST" action="/words/{{ $word->id }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                      <!-- Edit Term Input -->
<div class="sm:col-span-2 mt-4 mb-4">
    <label for="term" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white uppercase font-bold text-xs">The Term</label>
    <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">Please write the term in Arabic letters</p>
    <input required name="term" id="term" value="{{ old('term', $word->term) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="أمان">
    <div class="flex mt-2 space-x-2">
        <button type="button" onclick="insertTermLetter('ڤ')" class="px-2 py-1.5 text-xs font-semibold text-gray-800 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500"><kbd>ڤ (v)</kbd></button>
        <button type="button" onclick="insertTermLetter('پ')" class="px-2 py-1.5 text-xs font-semibold text-gray-800 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500"><kbd>پ (p)</kbd></button>
        <button type="button" onclick="insertTermLetter('چ')" class="px-2 py-1.5 text-xs font-semibold text-gray-800 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500"><kbd>چ (ch)</kbd></button>
        <button type="button" onclick="insertTermLetter('گ')" class="px-2 py-1.5 text-xs font-semibold text-gray-800 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500"><kbd>گ (ga)</kbd></button>
</div>
    @error("term")
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
    @enderror
</div>

<!-- Edit Pronunciation Input -->
<div class="sm:col-span-2 mt-4 mb-4">
    <label for="spell" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white uppercase font-bold text-xs">Pronunciation</label>
    <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">Please write the pronunciation in Latin letters + numbers (A-Z / 0 -9)</p>
    <input required name="spell" id="spell" value="{{ old('spell', $word->spell) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Aman">
    <div class="flex mt-2 space-x-2">
        <button type="button" onclick="insertSpellLetter('č')" class="px-2 py-1.5 text-xs font-semibold text-gray-800 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500"><kbd>č</kbd></button>
        <button type="button" onclick="insertSpellLetter('ḍ')" class="px-2 py-1.5 text-xs font-semibold text-gray-800 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500"><kbd>ḍ</kbd></button>
        <button type="button" onclick="insertSpellLetter('ǧ')" class="px-2 py-1.5 text-xs font-semibold text-gray-800 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500"><kbd>ǧ</kbd></button>
        <button type="button" onclick="insertSpellLetter('ḥ')" class="px-2 py-1.5 text-xs font-semibold text-gray-800 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500"><kbd>ḥ</kbd></button>
        <button type="button" onclick="insertSpellLetter('ɣ')" class="px-2 py-1.5 text-xs font-semibold text-gray-800 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500"><kbd>ɣ</kbd></button>
        <button type="button" onclick="insertSpellLetter('ṛ')" class="px-2 py-1.5 text-xs font-semibold text-gray-800 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500"><kbd>ṛ</kbd></button>
        <button type="button" onclick="insertSpellLetter('ṣ')" class="px-2 py-1.5 text-xs font-semibold text-gray-800 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500"><kbd>ṣ</kbd></button>
        <button type="button" onclick="insertSpellLetter('ṭ')" class="px-2 py-1.5 text-xs font-semibold text-gray-800 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500"><kbd>ṭ</kbd></button>
        <button type="button" onclick="insertSpellLetter('ẓ')" class="px-2 py-1.5 text-xs font-semibold text-gray-800 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500"><kbd>ẓ</kbd></button>
        <button type="button" onclick="insertSpellLetter('ɛ')" class="px-2 py-1.5 text-xs font-semibold text-gray-800 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-600 dark:text-gray-100 dark:border-gray-500"><kbd>ɛ</kbd></button>
</div>
    @error("spell")
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
    @enderror
</div>

<!-- JavaScript Functions -->
<script>
    function insertTermLetter(letter) {
        var input = document.getElementById('term');
        var cursorPosition = input.selectionStart;
        var textBeforeCursor = input.value.substring(0, cursorPosition);
        var textAfterCursor = input.value.substring(cursorPosition);
        input.value = textBeforeCursor + letter + textAfterCursor;
        // Set the cursor position after the inserted letter
        input.setSelectionRange(cursorPosition + 1, cursorPosition + 1);
    }

    function insertSpellLetter(letter) {
        var input = document.getElementById('spell');
        var cursorPosition = input.selectionStart;
        var textBeforeCursor = input.value.substring(0, cursorPosition);
        var textAfterCursor = input.value.substring(cursorPosition);
        input.value = textBeforeCursor + letter + textAfterCursor;
        // Set the cursor position after the inserted letter
        input.setSelectionRange(cursorPosition + 1, cursorPosition + 1);
    }
</script>

                        <div class="sm:col-span-2 mt-4 mb-4">

                            <label for="tifinagh" class="block mb-2 text-sm  font-medium text-gray-900 dark:text-white uppercase font-bold text-xs">Tifinagh</label>
                            <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">Not obligation </p>
                            <input name="tifinagh" id="tifinagh" value="{{ old('tifinagh', $word->tifinagh) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ⴰⵎⴰⵏ">

                            @error("tifinagh")
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="slangs" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white uppercase font-bold text-xs">Slang</label>
                            <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">You can select multi slangs </p>
                            <select multiple required name="slangs[]" id="slangs" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                @foreach (\App\Models\Slang::all() as $slang)
                                    <option
                                        value="{{ $slang->id }}"
                                        {{ in_array($slang->id, old('slangs', $word->slang->pluck('id')->toArray())) ? 'selected' : '' }}
                                    >{{ ucwords($slang->name) }}</option>
                                @endforeach
                            </select>
                            @error("slangs")
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>



                        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                            <ul class=" -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                                <li class="me-2" role="presentation">
                                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Arabic meaning</button>
                                </li>
                                <li class="me-2" role="presentation">
                                    <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Freanch meaning</button>
                                </li>
                                <li class="me-2" role="presentation">
                                    <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">English meaning</button>
                                </li>
                            </ul>
                        </div>
                        <div id="default-tab-content">
                            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <label for="ar_meaning" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white uppercase font-bold text-xs">المعنى بالعربية</label>
                                <textarea  name="ar_meaning" id="ar_meaning"  rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="الماء">{{ old('meaning', $word->ar_meaning) }}</textarea>
                                @error("ar_meaning")
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror                    </div>
                            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                <label for="fr_meaning" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white uppercase font-bold text-xs">Signification en français</label>
                                <textarea  name="fr_meaning" id="fr_meaning"  rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="L'eau">{{ old('meaning', $word->fr_meaning) }}</textarea>
                                @error("fr_meaning")
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror                    </div>
                            <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                                <label for="en_meaning" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white uppercase font-bold text-xs">Meaning in English</label>
                                <textarea  name="en_meaning" id="en_meaning"  rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Water">{{ old('meaning', $word->en_meaning) }}</textarea>
                                @error("en_meaning")
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                            </div>
                        </div>

                        <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select the type of the word</label>
                        <select id="type" name="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected disabled>ex: Verb</option>

                            @foreach(\App\Enums\WordEnum::getKeys() as $key)
                                <option value="{{ $key }}">{{ \App\Enums\WordEnum::from($key)->label }}</option>
                            @endforeach
                        </select>


                        <div class="sm:col-span-2 my-4">
                            <label for="uses" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white uppercase font-bold text-xs">Uses ( Optional ) </label>
                            <textarea  name="uses" id="uses"  rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="تصريف المصطلح مع مختلف الضمائر و الأزمنة">{{ old('uses', $word->uses) }}</textarea>
                        </div>
                        @error("uses")
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                    </div>


                        <div class="sm:col-span-2 my-8">
                            <label for="exemple" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white uppercase font-bold text-xs">Example</label>
                            <textarea  name="exemple" id="exemple" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="أويذ أدسواغ أمان">{{ old('exemple', $word->exemple) }}</textarea>
                            @error("exemple")
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>




                        {{-- <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                            Add word
                        </button> --}}






{{--
            <x-form.input name="term" :value="old('term', $word->term)" required />
            <x-form.input name="slug" :value="old('slug', $word->slug)" required /> --}}

            {{-- <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $word->thumbnail)" />
                </div>

                <img src="{{ asset('storage/' . $word->thumbnail) }}" alt="" class="rounded-xl ml-6" width="100">

                {{-- <x-form.textarea name="meaning" required>{{ old('meaning', $word->meaning) }}</x-form.textarea>
                <x-form.textarea name="exemple" required>{{ old('exemple', $word->exemple) }}</x-form.textarea>

                <x-form.field>
                    <x-form.label name="slang"/>

                    <select name="slangs[]" id="slangs" multiple required>
                        @foreach (\App\Models\Slang::all() as $slang)
                        <option
                        value="{{ $slang->id }}"
                        {{ in_array($slang->id, old('slangs', [])) ? 'selected' : '' }}
                        >{{ ucwords($slang->name) }}</option>
                        @endforeach
                    </select>

                    <x-form.error name="slang"/>
                </x-form.field> --}}

                <x-form.button>Update</x-form.button>
            </div>


        </form>
    </section>

    </x-setting>
</x-app-layout>
