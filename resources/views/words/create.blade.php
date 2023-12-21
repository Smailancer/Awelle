<x-app-layout>
    <x-setting heading="Publish New Word">


<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new word</h2>
        <form method="POST" action="/words" enctype="multipart/form-data">
            @csrf
            {{-- <div class="grid gap-4 sm:grid-cols-2 sm:gap-6"> --}}
                <div class="sm:col-span-2 mb-5">

                    <label for="term" class="block mt-2 text-sm font-medium text-gray-900 dark:text-white uppercase font-bold text-xs">The Term<span class="text-red-500 font-bold text-lg">*</span></label>
                    <p id="helper-text-explanation" class="text-sm text-gray-500 dark:text-gray-400">Please write the term in arabic letters with diactrics "المصطلح بالتشكيل"</p>
                    <input required name="term" id="term" value="{{ old('term') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="أَوَالْ">

                    @error("term")
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                </div>

                <div class="sm:col-span-2 mb-5">

                    <label for="spell" class="block mb-2 mt-2  text-sm  font-medium text-gray-900 dark:text-white uppercase font-bold text-xs">Prononciation<span class="text-red-500 font-bold text-lg">*</span></label>
                    <p id="helper-text-explanation" class=" text-sm text-gray-500 dark:text-gray-400">Please write the prononciation in latin letters + numbers (A-Z / 0 -9) </p>
                    <input required name="spell" id="spell" value="{{ old('spell') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Awelle">

                    @error("spell")
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-2 mb-5">

                    <label for="tifinagh" class="block mb-2  mt-2 text-sm  font-medium text-gray-900 dark:text-white uppercase font-bold text-xs">Tifinagh</label>
                    <p id="helper-text-explanation" class=" text-sm text-gray-500 dark:text-gray-400">Not obligation </p>
                    <input name="tifinagh" id="tifinagh" value="{{ old('tifinagh') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ⴰⵡⴰⵍ">

                    @error("tifinagh")
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>


                <div>
                    <label for="slangs" class="block mb-2 mt-2  text-sm font-medium text-gray-900 dark:text-white uppercase font-bold text-xs">Slang <span class="text-red-500 font-bold text-lg">*</span></label>
                    <select multiple required name="slangs[]" id="slangs" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @foreach (\App\Models\Slang::all() as $slang)
                            <option
                                value="{{ $slang->id }}"
                                {{ in_array($slang->id, old('slangs', [])) ? 'selected' : '' }}
                            >{{ ucwords($slang->name) }}</option>
                            @endforeach
                    </select>
                    @error("slangs")
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
                </div>




{{-- ----- --}}


                <div class="mb-5 border-b border-gray-200 dark:border-gray-700">
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
                <div id="default-tab-content mb-5">
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <label for="ar_meaning" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white uppercase font-bold text-xs">المعنى بالعربية<span class="text-red-500 font-bold text-lg">*</span></label>
                        <textarea  name="ar_meaning" id="ar_meaning" required rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="الماء"></textarea>
                        @error("ar_meaning")
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror                    </div>
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                        <label for="fr_meaning" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white uppercase font-bold text-xs">Signification en français</label>
                        <textarea  name="fr_meaning" id="fr_meaning"  rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="L'eau"></textarea>
                        @error("fr_meaning")
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror                    </div>
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                        <label for="en_meaning" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white uppercase font-bold text-xs">Meaning in English</label>
                        <textarea  name="en_meaning" id="en_meaning"  rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Water"></textarea>
                        @error("en_meaning")
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                    </div>
                </div>

                <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select the type of the word</label>
                <select id="type" name="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected disabled>Select the type of the word</option>

                    @foreach(\App\Enums\WordEnum::getKeys() as $key)
                        <option value="{{ $key }}">{{ \App\Enums\WordEnum::from($key)->label }}</option>
                    @endforeach
                </select>



                <div class="sm:col-span-2 my-4">
                    <label for="uses" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white uppercase font-bold text-xs">Uses ( Optional ) </label>
                    <textarea  name="uses" id="uses"  rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="تصريف المصطلح مع مختلف الضمائر و الأزمنة"></textarea>
                </div>
                @error("uses")
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                    <div class="sm:col-span-2 my-8">
                        <label for="exemple" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white uppercase font-bold text-xs">Examples</label>
                        <textarea  name="exemple" id="exemple"  rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="أويذ أدسواغ أمان"></textarea>
                    </div>
                    @error("exemple")
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <x-form.button>Publish</x-form.button>
            </div>
            {{-- <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                Add word
            </button> --}}
        </form>
    </div>
    </section>


              {{-- <x-form.label name="{{ $name }}" />

              <textarea
                  class="border border-gray-200 p-2 w-full rounded"
                  name="{{ $name }}"
                  id="{{ $name }}"
                  required
                  {{ $attributes }}
              >{{ $slot ?? old($name) }}</textarea>

              <x-form.error name="{{ $name }}" /> --}}


            {{-- <label for="term" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">The Term</label>
            <input name="term" id="term" value="{{ old('term') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="أمان">
            <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">Write the term please in arabic letters</p>

            @error("term")
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror


            <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prononciation</label>
<input name="slug" id="slug" value="{{ old('slug') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Aman">
<p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">write the prononciation please in latin letters + numbers (A-Z / 0 -9) </p>
@error("slug")
    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
@enderror --}}

    {{-- <input class="border border-gray-200 p-2 w-full rounded"
           name="{{ $name }}"
           id="{{ $name }}"
           {{ $attributes(['value' => old($name)]) }}
    >

    <x-form.error name="{{ $name }}"/>

            <x-form.input name="term" required />
            <x-form.input name="slug" required /> --}}
            {{-- <x-form.textarea name="meaning" required />
            <x-form.textarea name="exemple" required />

            <x-form.field> --}}
            {{-- <x-form.label name="slang"/> --}}



                {{-- <select name="slangs[]" id="slangs" multiple required>
                    @foreach (\App\Models\Slang::all() as $slang)
                        <option
                            value="{{ $slang->id }}"
                            {{ in_array($slang->id, old('slangs', [])) ? 'selected' : '' }}
                        >{{ ucwords($slang->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="slang"/>
            </x-form.field> --}}

            {{-- <x-form.button>Publish</x-form.button>
        </form> --}}
    </x-setting>
</x-app-layout>
