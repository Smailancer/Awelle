<nav class="bg-white border-gray-200 dark:bg-gray-900 shadow-lg">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-2">
        <a href="{{ route('home') }}">
            <img src="/images/logo.png" alt="Awelle Logo" width="100" height="100">
        </a>
    <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">

        <div class="switch px-2 ">
            @include('components.language-switch')
        </div>
@auth

        <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600 m-4" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
          <span class="sr-only">Open user menu</span>
          <img class="w-10 h-10 rounded-full" src="{{Auth::user()->gravatar}}" alt="user photo">
        </button>
        <!-- Dropdown menu -->

        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
          <div class="px-4 py-3">
            <span class="block text-sm text-gray-900 dark:text-white ">  Azul {{ auth()->user()->username }}!</span>
            <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ auth()->user()->email }}</span>
          </div>

          <ul class="py-2" aria-labelledby="user-menu-button">
            <li>
              <a href="{{route('profile.edit')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">{{ __('messages.Profile') }}</a>
            </li>
            @admin
            <li>
              <a href="/admin/words" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">{{ __('messages.Admin Panel') }}</a>
            </li>
            <li>
              <a href="/admin/correction-suggestions" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">{{ __('messages.Admin Suggestions') }} </a>
            </li>
            @endadmin
            <li>
              <a href="/words/create" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">{{ __('messages.Add a word') }} </a>
            </li>
            <li>
              {{-- <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</a> --}}
              <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                {{ __('messages.Log Out') }}
</x-dropdown-link>
            </form>
            </li>
          </ul>
        </div>

        @else
        <div class="flex items-center space-x-6 rtl:space-x-reverse">
            <a href="/register" class="text-sm  text-gray-500 dark:text-white hover:underline">{{__('messages.Register')}}</a>
            <a href="/login" class="text-sm  text-blue-600 dark:text-blue-500 hover:underline">{{__('messages.Login')}}</a>
        </div>
    @endauth

        <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
      </button>



    {{-- <div class="switch">
        @include('components.language-switch')
    </div> --}}

    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
        <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
            <li>
                <a href="/About" class="block py-2 px-3 {{ request()->is('About') ? 'text-white bg-blue-700 md:text-blue-700' : 'text-gray-900 hover:bg-gray-100'  }} rounded md:bg-transparent  md:p-0 md:dark:text-blue-500 md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" aria-current="page">{{ __('messages.About') }}</a>
            </li>
            <li>
                <a href="/Langlab" class="block py-2 px-3 {{ request()->is('Langlab') ? 'text-white bg-blue-700 md:text-blue-700' : 'text-gray-900 hover:bg-gray-100' }} rounded md:bg-transparent md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">{{ __('messages.Lang Lab') }}</a>
            </li>
            <li>
                <a href="/Procourt" class="block py-2 px-3 {{ request()->is('Procourt') ? 'text-white bg-blue-700 md:text-blue-700' : 'text-gray-900 hover:bg-gray-100' }} rounded md:bg-transparent md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">{{ __('messages.Proverbs Court') }}</a>
            </li>
            <li>
                <a href="/Academy" class="block py-2 px-3 {{ request()->is('Academy') ? 'text-white bg-blue-700 md:text-blue-700' : 'text-gray-900 hover:bg-gray-100' }} rounded md:bg-transparent md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">{{ __('messages.Academy') }}</a>
            </li>
            <li>
                <a href="/wordscloud" class="block py-2 px-3 {{ request()->is('wordscloud') ? 'text-white bg-blue-700 md:text-blue-700' : 'text-gray-900 hover:bg-gray-100'  }} rounded md:bg-transparent  md:p-0 md:dark:text-blue-500 md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" aria-current="page">{{ __('messages.Words Cloud') }}</a>
            </li>
            <li>
                <a href="/Contact" class="block py-2 px-3 {{ request()->is('Contact') ? 'text-white bg-blue-700 md:text-blue-700' : 'text-gray-900 hover:bg-gray-100' }} rounded md:bg-transparent md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">{{ __('messages.Contact') }}</a>
            </li>
        </ul>
    </div>

    </div>
  </nav>
