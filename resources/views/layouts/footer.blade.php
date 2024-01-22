<footer class="w-full bg-grey sm:text-center rounded-lg shadow dark:bg-gray-900 m-4 shadow-lg">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            {{-- <a href="https://flowbite.com/" class="flex items-center mb-4 sm:mb-0">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
            </a> --}}

            <div class="py-5">
                <a href="{{ route('home') }}">
                    <img src="/images/logo.png" alt="Awelle Logo" width="100" height="100">
                </a>
            </div>


            <ul class="flex flex-wrap items-center mb-6 sm:text-center text-sm font-medium text-gray-500 sm:mb-0  dark:text-gray-400">
                <li>
                    <a href="About" class="mr-4 hover:underline md:mr-6 ">About</a>
                </li>
                <li>
                    <a href="Tamlab" class="mr-4 hover:underline md:mr-6">Tamazight Lab</a>
                </li>
                <li>
                    <a href="Procourt" class="mr-4 hover:underline md:mr-6 ">Proverb court</a>
                </li>
                <li>
                    <a href="Academy" class="mr-4 hover:underline md:mr-6 ">Academy</a>
                </li>
                <li>
                    <a href="Contact" class="hover:underline">Contact</a>
                </li>
            </ul>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">
            Made in <span class="text-green-500 text-1xl">🌍</span> with <span class="text-red-500">&#10084;&#65039;</span> © 2024
            <a href="/" class="hover:underline mb-6">Awelle™</a>.

            <p>Contact us at &#128231; : <a href="mailto:salam@awelle.net" class="hover:underline">salam@awelle.net</a></p>
        </span>

    </div>
</footer>
