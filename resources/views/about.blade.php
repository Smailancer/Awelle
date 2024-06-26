<x-app-layout>



<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
        <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12 mb-8">
            <h1 class="text-gray-900 dark:text-white text-3xl md:text-5xl font-extrabold mb-4"> {{ __('messages.Vision') }}</h1>
            <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-8">Documenting <span class="underline underline-offset-3 decoration-4 decoration-amber-400 dark:decoration-blue-600"> and developing the North African vocabulary elements </span>of tangible and intangible heritage, starting from the dialects of each society, to nature, food and the names of its ingredients, to clothing, holiday traditions, daily life habits, commonly used tools, and artistic production ...</p> </p>

            <a href="#" class="bg-blue-100 text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-blue-400 mb-2">
                <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                    <path d="M11 0H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm8.585 1.189a.994.994 0 0 0-.9-.138l-2.965.983a1 1 0 0 0-.685.949v8a1 1 0 0 0 .675.946l2.965 1.02a1.013 1.013 0 0 0 1.032-.242A1 1 0 0 0 20 12V2a1 1 0 0 0-.415-.811Z"/>
                </svg>
                {{ __('messages.Community') }}
            </a>

            <ul class="space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
            <li>{{ __('messages.lab text') }}</li>
            <li>{{ __('messages.court text') }}</li>
            <li>{{ __('messages.accademey text') }}</li>
            </ul>

        </div>
        {{-- <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12">
                <a href="#" class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 mb-2">
                    <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                        <path d="M17 11h-2.722L8 17.278a5.512 5.512 0 0 1-.9.722H17a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1ZM6 0H1a1 1 0 0 0-1 1v13.5a3.5 3.5 0 1 0 7 0V1a1 1 0 0 0-1-1ZM3.5 15.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2ZM16.132 4.9 12.6 1.368a1 1 0 0 0-1.414 0L9 3.55v9.9l7.132-7.132a1 1 0 0 0 0-1.418Z"/>
                    </svg>
                    Design
                </a>
                <h2 class="text-gray-900 dark:text-white text-3xl font-extrabold mb-2">Start with Flowbite Design System</h2>
                <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-4">Static websites are now used to bootstrap lots of websites and are becoming the basis for a variety of tools that even influence both web designers and developers.</p>
                <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline font-medium text-lg inline-flex items-center">Read more
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
                </a>
            </div> --}}
            <div class="bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-8 md:p-12">
                <a href="#" class="bg-purple-300 text-purple-900 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-purple-400 mb-2">
                    <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4 1 8l4 4m10-8 4 4-4 4M11 1 9 15"/>
                    </svg>
                    16/04/2024
                </a>
                <h2 class="text-gray-900 dark:text-white text-3xl font-extrabold mb-2"> {{ __('messages.Updates') }} :</h2>
                <p class="text-lg font-normal text-gray-500 dark:text-gray-400 mb-4">

                    <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                        <li class="line-through decoration-yellow-300">Add website translation</li>
                        <li class="line-through decoration-yellow-300">Activate the Type field for words and use Enums.</li>
                        <li class="line-through decoration-yellow-300">Revamp the display of words, avoiding reliance on slugs in URLs and not making them unique due to many similar words in writing and pronunciation.</li>
                        <li class="line-through decoration-yellow-300">Search for words without diacritics (Fuzzy Search).</li>
                        <li class="line-through decoration-yellow-300">Return to the previous page after logging in.</li>
                        <li class="line-through decoration-yellow-300">Add a list of future features on the About page.</li>
                        <li class="line-through decoration-yellow-300">Filter by word type</li>
                        <li class="line-through decoration-yellow-300">Words edit suggestions Featuer</li>
                        <li>Ability to edit comments by its own author .</li>
                        <li class="line-through decoration-yellow-300">Ability Delete comments by the author and the administrator.</li>
                        <li class="line-through decoration-yellow-300">Activate the comments section.</li>
                        <li class="line-through decoration-yellow-300">Programming the Import feature to import Excel files specifically for words.</li>
                        <li class="line-through decoration-yellow-300">Add Shilha language.</li>
                        <li class="line-through decoration-yellow-300">Quick add button for words on all pages.</li>
                        <li class="line-through decoration-yellow-300">Problem creating and editing words without logging in.</li>
                        <li class="line-through decoration-yellow-300">Ability to edit words and fix the slug issue.</li>
                        <li class="line-through decoration-yellow-300">Add a field for Tifinagh.</li>
                        <li>Indicate the number of words added on the homepage.</li>
                        <li>Finding a solution for how to display the different uses of nouns (plural and feminine), the same for verbs (verb conjugation with different pronouns and tenses)</li>
                        <li>Think about the appropriate number of words displayed on the homepage.</li>
                        <li>Pagination for words in the admin panel.</li>
                        <li>Activate password reset functionality.</li>
                        <li>Add a section to the admin control panel for managing words for each user to manage their words.</li>
                        <li class="line-through decoration-yellow-300">Final modification to layout vs app to solve the small screen issue.</li>
                        <li class="line-through decoration-yellow-300">Activate the contact us form.</li>
                        <li>Night mode.</li>
                        <li>Most active users</li>
                        <li>Activate the mailing list.</li>
                        <li>Add a filter to display matching words in more than one dialect (Edit in the search list only and make it multi-select).</li>
                   <li>...</li>
                </p>
                {{-- <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline font-medium text-lg inline-flex items-center">Read more
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a> --}}

                <form>


                    <div class="mb-6 mt-10">
                    <h3 class="text-xl font-bold dark:text-white mb-5">Seggest new features to add to the list :</h3>
                    <input type="text" id="success" class="bg-green-50 border border-green-500 text-green-900 dark:text-green-400 placeholder-green-700 dark:placeholder-green-500 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-green-500" placeholder="New Idea">
                    {{-- <p class="mt-2 text-sm text-red-600 dark:text-green-red"><span class="font-medium">Not available for now!</span> .</p> --}}
                  </div>
                </form>
            </div>

        </div>
    </div>

</section>

</x-app-layout>
