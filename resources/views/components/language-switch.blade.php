<div class="flex items-center md:order-2 space-x-1 md:space-x-0 rtl:space-x-reverse">
    <div class="dropdown relative">
        <button class="dropdown-toggle inline-flex justify-center p-2 text-sm text-gray-900 dark:text-white rounded-lg cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700" type="button" id="language-dropdown" data-dropdown-toggle="language-dropdown-menu">
            <!-- Display flag based on the current application locale -->
            @switch(app()->getLocale())
                @case('en')
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Flag_of_the_United_Kingdom_%281-2%29.svg/1200px-Flag_of_the_United_Kingdom_%281-2%29.svg.png" class="w-8 h-8 rounded-full" alt="English">
                    @break
                @case('ar')
                    <img src="https://qph.cf2.quoracdn.net/main-qimg-f029685579519cea272405dc5795acf3" class="w-8 h-8 rounded-full" alt="العربية">
                    @break
                @case('fr')
                    <img src="https://e7.pngegg.com/pngimages/443/340/png-clipart-blue-white-and-red-flag-flag-of-france-national-flag-flag-of-the-united-states-helium-blue-flag.png" class="w-8 h-8 rounded-full" alt="Français">
                    @break
                @case('zgh')
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Berber_flag.svg/1200px-Berber_flag.svg.png" class="w-8 h-8 rounded-full" alt="Tamazight">
                    @break
                @default
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Flag_of_the_United_Kingdom_%281-2%29.svg/1200px-Flag_of_the_United_Kingdom_%281-2%29.svg.png" class="w-8 h-8 rounded-full" alt="English">
            @endswitch
        </button>
        <!-- Dropdown menu, forms for POST request with flag images -->
        <div id="language-dropdown-menu" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700" data-popper-placement="bottom-start">
            <ul class="py-1 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="language-dropdown">
                <!-- English -->
                <li>
                    <form action="{{ route('language.switch') }}" method="POST" class="block w-full">
                        @csrf
                        <input type="hidden" name="language" value="en">
                        <button type="submit" class="block w-full px-4 py-2 text-left">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Flag_of_the_United_Kingdom_%281-2%29.svg/1200px-Flag_of_the_United_Kingdom_%281-2%29.svg.png" class="w-4 h-4 rounded-full mr-2 inline" alt="English"> English
                        </button>
                    </form>
                </li>
                <!-- Arabic -->
                <li>
                    <form action="{{ route('language.switch') }}" method="POST" class="block w-full">
                        @csrf
                        <input type="hidden" name="language" value="ar">
                        <button type="submit" class="block w-full px-4 py-2 text-left">
                            <img src="https://qph.cf2.quoracdn.net/main-qimg-f029685579519cea272405dc5795acf3" class="w-4 h-4 rounded-full mr-2 inline" alt="العربية"> العربية
                        </button>
                    </form>
                </li>
                <!-- French -->
                <li>
                    <form action="{{ route('language.switch') }}" method="POST" class="block w-full">
                        @csrf
                        <input type="hidden" name="language" value="fr">
                        <button type="submit" class="block w-full px-4 py-2 text-left">
                            <img src="https://e7.pngegg.com/pngimages/443/340/png-clipart-blue-white-and-red-flag-flag-of-france-national-flag-flag-of-the-united-states-helium-blue-flag.png" class="w-4 h-4 rounded-full mr-2 inline" alt="Français"> Français
                        </button>
                    </form>
                </li>
                <!-- Tamazight -->
                <li>
                    <form action="{{ route('language.switch') }}" method="POST" class="block w-full">
                        @csrf
                        <input type="hidden" name="language" value="zgh">
                        <button type="submit" class="block w-full px-4 py-2 text-left">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Berber_flag.svg/1200px-Berber_flag.svg.png" class="w-4 h-4 rounded-full mr-2 inline" alt="Tamazight"> Tamazight
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
