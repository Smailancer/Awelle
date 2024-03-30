<footer class="w-full bg-grey rounded-lg shadow dark:bg-gray-900 m-4 shadow-lg">
    <div class="w-full max-w-screen-xl mx-auto p-4">
        <div class="flex flex-col sm:flex-row items-center justify-between">
            <div class="py-5 text-center">
                <a href="{{ route('home') }}">
                    <img src="/images/logo.png" alt="Awelle Logo" width="100" height="100">
                </a>
            </div>

            <ul class="flex flex-wrap justify-center items-center mb-6 text-sm font-medium text-gray-500 dark:text-gray-400">
                <li>
                    <a href="/words/create" class="mr-4 hover:underline md:mr-6 ">{{ __('messages.Add a word') }}</a>
                </li>
                <li>
                    <a href="About" class="mr-4 hover:underline md:mr-6 ">{{ __('messages.About') }}</a>
                </li>
                <li>
                    <a href="Community" class="mr-4 hover:underline md:mr-6">{{ __('messages.Community') }}</a>
                </li>
                <li>
                    <a href="Contact" class="hover:underline">{{ __('messages.Contact') }}</a>
                </li>
            </ul>
        </div>
        <hr class="my-3 border-gray-200 dark:border-gray-700 lg:my-8" />
        <span class="block text-sm text-center text-gray-500 dark:text-gray-400">
            Made in <span class="text-green-500">🌍</span> with <i class="fa-solid fa-heart fa-beat" style="color: #f40b0b;"></i> © 2024
            <a href="/" class="hover:underline">Awelle™</a>.
            <p>Contact us at &#128231; : <a href="mailto:salam@awelle.net" class="hover:underline">salam@awelle.net</a></p>
        </span>

        <div class="flex justify-center mt-4 my-5">
            <a href="https://facebook.com/www.awelle.net" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                <i class="fa-brands fa-facebook fa-lg"></i>
                <span class="sr-only">Facebook page</span>
            </a>
            <a href="https://instagram.com/awelle_net/" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ml-5">
                <i class="fa-brands fa-instagram fa-lg"></i>
                <span class="sr-only">Instagram</span>
            </a>
            <a href="https://twitter.com/Awelle_Net" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ml-5">
                <i class="fa-brands fa-twitter fa-lg"></i>
                <span class="sr-only">Twitter</span>
            </a>
            <a href="https://t.me/Awelle_Net" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ml-5">
                <i class="fa-brands fa-telegram fa-lg"></i>
                <span class="sr-only">Telegram</span>
            </a>
        </div>
    </div>
</footer>
