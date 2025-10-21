<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <!-- Google tag (gtag.js) -->

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-LWFNFMBCH7"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-LWFNFMBCH7');
    </script>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Awelle Tmazight Dictionary</title>

        <!-- Fonts -->
        {{-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}

        {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css"  rel="stylesheet" /> --}}

        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        {{-- <link rel="preconnect" href="https://fonts.gstatic.com"> --}}
        {{-- <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet"> --}}
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>


        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Amiri+Quran&family=Cairo&display=swap" rel="stylesheet">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

        <style>
            html {
                scroll-behavior: smooth;
            }

            .clamp {
                display: -webkit-box;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            .clamp.one-line {
                -webkit-line-clamp: 1;
            }
        </style>
    <script src="//cdn.wordart.com/wordart.min.js" async defer></script>

    <script
      defer
      data-website-id="dfid_t5RwImwrTvlPtGQDLEuWh"
      data-domain="awale.net"
      src="https://datafa.st/js/script.js">
    </script>

</head>
    <body style="font-family: 'Cairo',Open Sans, sans-serif; ">

        <div class="px-2 py-2 min-h-screen">

            @include('layouts.navigation')

        @if(session('success'))
            {{-- <div class="alert alert-success">
              {{ session('success') }}
            </div> --}}

            {{-- <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                <span class="font-medium">Success alert!</span>  {{ session('success') }}
              </div> --}}

              <div id="alert-border-3" class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
                <div class="ms-3 text-sm font-medium">
                    {{ session('success') }}
                </div>
                <button type="button" class="ms-auto bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-border-3" aria-label="Close">
                  <span class="sr-only">Dismiss</span>
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                  </svg>
                </button>
            </div>

        @endif


        @if ($errors->any())
        <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2z"/>
            </svg>
            <span class="sr-only">Danger</span>
            <div>
                <span class="font-medium">Please address the following errors:</span>
                <ul class="mt-1.5 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

            <!-- Page Heading -->
            @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
            @endif

            <!-- Page Content -->
            <main >
                {{ $slot }}
            </main>
        </div>


        <div data-dial-init class="fixed bottom-6 right-6 group">
            <div id="speed-dial-menu-dropdown-alternative" class="flex flex-col justify-end hidden py-1 pb-0 mb-4 space-y-2 bg-white border border-gray-100 rounded-lg shadow-sm dark:bg-gray-700 dark:border-gray-600">
                <ul class="text-sm text-gray-500 dark:text-gray-300">

                    <li>
                        <a href="#" class="flex items-center px-5 py-2 border-b border-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-gray-900 dark:hover:text-white dark:border-gray-600">

                            <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M19 4h-1a1 1 0 1 0 0 2v11a1 1 0 0 1-2 0V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V5a1 1 0 0 0-1-1ZM3 4a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v..."/>
                                <path d="M6 5H5v1h1V5Z"/>
                            </svg>
                            <span class="text-sm font-medium">{{ __('messages.Prononciation') }}</span>
                        </a>


                    </li>

                    <li>
                        <a href="/words/create" class="flex items-center px-5 py-2 border-b border-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-gray-900 dark:hover:text-white dark:border-gray-600">
                            <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512">
                                <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32V112c0-17.7-14.3-32-32-32H256z"/>
                            </svg>

                            <span class="text-sm font-medium">{{ __('messages.Add a word') }}</span>
                        </a>
                    </li>

                    <li>
                        <a href="/Contact" class="flex items-center px-5 py-2 border-b border-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600 hover:text-gray-900 dark:hover:text-white dark:border-gray-600">
                            <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-3 9h-2v2c0 .55-.45 1-1 1s-1-.45-1-1v-2H7c-.55 0-1-.45-1-1s.45-1 1-1h6V7c0-.55.4-.999 1-.999s1 .449 1 1V11z"/>
                            </svg>

                            <span class="text-sm font-medium">{{ __('messages.Contact') }}</span>
                        </a>
                    </li>


                </ul>
            </div>
            <button type="button" data-dial-toggle="speed-dial-menu-dropdown-alternative" aria-controls="speed-dial-menu-dropdown-alternative" aria-expanded="false" class="flex items-center justify-center w-12 h-12 rounded-full bg-blue-600 text-white shadow-lg">
                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="m13.835 7.578-.005.007-7.137 7.137 2.139 2.138 7.143-7.142-2.14-2.14Zm-10.696 3.59 2.139 2.14 7.138-7.137.007-.005-2.141-2.141-7.143 7.143Zm1.433 4.261L2 12.852.051 1.23..."/>
                </svg>
                <div class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900"></div>

                <span class="sr-only">Open actions menu</span>
            </button>
        </div>

        <div id="drawer-right-example" class="fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-80 dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-right-label">
            <h5 id="drawer-right-label" class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400"><svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"><path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/></svg>Prononciation</h5>
           <button type="button" data-drawer-hide="drawer-right-example" aria-controls="drawer-right-example" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg">
              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                 <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
              </svg>
              <span class="sr-only">Close menu</span>
           </button>

           <h4 class="text-2xl font-bold dark:text-white">Non-Latin scripts letters</h3>
           <p class="mb-6 text-sm text-gray-500 dark:text-gray-400">
            <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                <li>č (چ) - ج بثلاث نقط ينطق تشا</li>
                <li>ǧ (دج) - ينطق جيما معطشة دجـا</li>
                <li>ḍ (ض) - ينطق كحرف الضاد</li>
                <li>ḥ (ح) - ينطق كحرف الحاء</li>
                <li>ɣ (غ) - ينطق كحرف الغين</li>
                <li>ṛ (َر) - ينطق كراء مغلظة</li>
                <li>ṣ (ص) - ينطق كحرف الصاد</li>
                <li>ṭ (ط) - ينطق كحرف الطاء</li>
                <li>ẓ (ژ) - ينطق كحرف زاي مغلظ</li>
                <li>ɛ (ع) - ينطق كحرف العين</li>
                <li>q (ق) - ينطق كحرف القاف</li>
                <li>x (خ) - ينطق كحرف الخاء</li>
            </ul>

            <h4 class="text-2xl font-bold dark:text-white mt-10 mb-5 ">Non-Arabic scripts letters</h3>
            <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                <li>چ (ch) - ج مثلثة تشا  </li>
                <li>پ (p) - P باء مثلثة تنطق </li>
                <li>ڨ (ga) - Ga قاف مثلثة تنطق  </li>
                <li>ڥ (v) - V ينطق مثل الحرف اللاتيني </li>
                <li>ژ (ẓ) -  زاي المثلثة تنطق ز مفخمة</li>
            </ul>

            <h4 class="text-2xl font-bold dark:text-white mt-10 mb-5 ">Numbers </h3>
            <ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                <li>3 : Represents the Arabic letter "ع"</li>
                <li>7 : Represents the Arabic letter "ح"</li>
                <li>9 : Represents the Arabic letter "ق"</li>
                <li>6 : Represents the Arabic letter "ط"</li>
                <li>5 : Represents the Arabic letter "خ"</li>
                <li>2 : Represents the Arabic letter "ء" (Hamzah), which is often written as a glottal stop.</li>

            </ul>


            <div class="grid grid-cols-2 gap-4">
           </div>
        </div>

        @include('layouts.footer')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    </body>
</html>
