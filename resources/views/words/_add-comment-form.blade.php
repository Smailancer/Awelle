@auth
    <x-panel>
        <form method="POST" action="/words/{{ $word->slug }}/comments">
            @csrf

            <header class="flex items-center">
                <img src="{{Auth::user()->gravatar}}"
                     alt="user photo"
                     width="40"
                     height="40"
                     class="rounded-full">

                <h2 class="ml-4">You have more informations ?</h2>
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
@else
    <p class="font-semibold">
        <a href="/register" class="hover:underline">Register</a> or
        <a href="/login" class="hover:underline">log in</a> to leave a comment.
    </p>
@endauth
