@props(['comment', 'word'])




<x-panel class="bg-gray-50">

<article class="p-6 text-base bg-gray-50 rounded-lg dark:bg-gray-900">
    <footer class="flex justify-between items-center mb-2">
        <div class="flex items-center">
            <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold"><img
                    class="mr-2 w-10 h-10 rounded-full"
                    src="{{ $comment->author->gravatar }}"
                    alt="Michael Gough"> <a href="/?author={{ $comment->author->username }}">{{ $comment->author->username }}</a></p>
            <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                    title="February 8th, 2022">{{ $comment->created_at->diffForHumans() }}</time></p>
        </div>

@auth


        <button id="dropdownComment1Button-{{ $comment->id }}" data-dropdown-toggle="dropdownComment1-{{ $comment->id }}"
            class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            type="button">
            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
            </svg>
            <span class="sr-only">Comment settings</span>
        </button>
        <!-- Dropdown menu -->
        <div id="dropdownComment1-{{ $comment->id }}"
            class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                aria-labelledby="dropdownMenuIconHorizontalButton">
                <li>
                    <a href="#"
                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                </li>
                <li>
                    <form id="deleteCommentForm" method="POST" action="/words/{{ $word->spell }}/comments/{{ $comment->id }}" onsubmit="return false;">
                        @csrf
                        @method('DELETE')
                        <a href="#" onclick="confirmDelete()" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete</a>
                    </form>

                    <script>
                        function confirmDelete() {
                            if (confirm('Are you sure you want to delete this comment?')) {
                                document.getElementById('deleteCommentForm').submit();
                            }
                        }
                    </script>

                </li>
                <li>

                    <a href="#"
                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                </li>
            </ul>
        </div>
        @endauth
    </footer>
    <p class="text-gray-500 dark:text-gray-400 ml-10">{{ $comment->body }}</p>
</article>




    {{-- <article class="flex space-x-4">
        <div class="flex-shrink-0">
            <img src="{{ $comment->author->gravatar }}"
            alt="user photo"
            width="60"
            height="60"
            class="rounded-xl">

        </div>

        <div>
            <header class="mb-4">
                <h3 class="font-bold">{{ $comment->author->username }}</h3>

                <p class="text-xs">
                    Posted
                    <time>{{ $comment->created_at->format('F j, Y, g:i a') }}</time>
                </p>
            </header>

            <p>
                {{ $comment->body }}
            </p>
        </div>
    </article> --}}
</x-panel>
