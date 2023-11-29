<x-layout>
    <x-setting :heading="'Edit '">

            <section class="bg-white dark:bg-gray-900">
                <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
                    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
                        Edit the word
                        <span class="text-yellow-500">{{$word->term}}</span>
                    </h2>                    <form method="POST" action="/words/{{ $word->slug }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                        <div class="sm:col-span-2">
                            <label for="term" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white uppercase font-bold text-xs">The Term</label>
                            <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">Please write the term in Arabic letters</p>
                            <input required name="term" id="term" value="{{ old('term', $word->term) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="أمان">

                            @error("term")
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="sm:col-span-2">
                            <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white uppercase font-bold text-xs">Prononciation</label>
                            <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">Please write the prononciation in Latin letters + numbers (A-Z / 0 -9) </p>
                            <input required name="slug" id="slug" value="{{ old('slug', $word->slug) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Aman">

                            @error("slug")
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

                        <div>
                            <label for="countries_multiple" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white uppercase font-bold text-xs">Select Regions</label>
                            <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">We will add this soon when we figure out how to do it </p>
                            <select  disabled id="wilayas_multiple" class="bg-gray-400 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Not available for now</option>
                                <option value="US">North</option>
                                <option value="CA">South</option>
                                <option value="FR">East</option>
                                <option value="DE">West</option>
                            </select>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="meaning" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white uppercase font-bold text-xs">Explanation</label>
                            <textarea  name="meaning" id="meaning" required rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Your description here">{{ old('meaning', $word->meaning) }}</textarea>
                            @error("meaning")
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label for="exemple" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white uppercase font-bold text-xs">Example</label>
                            <textarea  name="exemple" id="exemple" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Your description here">{{ old('exemple', $word->exemple) }}</textarea>
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
            </div> --}}

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
        </form>
        </div>
    </section>
    </x-setting>
</x-layout>
