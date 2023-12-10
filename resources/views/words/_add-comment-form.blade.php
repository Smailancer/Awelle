{{-- @auth --}}
    <x-panel>
        <form method="POST" action="/words/{{ $word->term }}/comments">
            @csrf

            <header class="flex items-center">
                @if(Auth::check())
                    <img src="{{ Auth::user()->gravatar }}" a alt="user photo"
                    alt="user photo"
                    width="60"
                    height="60"
                    class="rounded-xl">
                @else
                    <img src="{{ asset('https://www.gravatar.com/avatar') }}" alt="default gravatar"
                    alt="user photo"
                    width="60"
                    height="60"
                    class="rounded-xl">
                @endif

                <h2 class="ml-4">Do you have any more information?</h2>
            </header>


            <div class="mt-6">
                <textarea
                    name="body"
                    class="w-full text-sm focus:outline-none focus:ring "
                    rows="5"
                    placeholder="Comments are disabled for now"
                    required></textarea>

                @error('body')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                <x-form.button>Submit</x-form.button>
            </div>
        </form>
    </x-panel>
{{-- @else
    <p class="font-semibold">
        <a href="/register" class="hover:underline">Register</a> or
        <a href="/login" class="hover:underline">log in</a> to leave a comment.
    </p>
@endauth --}}
