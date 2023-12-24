
<x-app-layout>
    <x-setting heading="Correction Suggestion">

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Original Term Column -->
                <div class="bg-white p-6 border border-gray-200 rounded-lg shadow">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">{{ $originalWord->term }}</h2>
                    <p class="text-gray-700 mb-4">{{ $originalWord->ar_meaning }}</p>
                    <!-- Add other details you want to display for the original term -->
                </div>

                <!-- Suggested Term Column -->
                <div class="bg-white p-6 border border-gray-200 rounded-lg shadow">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">{{ $suggestedWord->term }}</h2>
                    <p class="text-gray-700 mb-4">{{ $suggestedWord->ar_meaning }}</p>
                    <!-- Add other details you want to display for the suggested term -->
                </div>
            </div>
        </main>




                    <!-- Approve and Decline buttons -->
                    {{-- <form method="post" action="{{ route('admin.words.processCorrection', $suggestion->id) }}">
                        @csrf
                        <button type="submit" name="action" value="approve" class="btn btn-success">Approve</button>
                        <button type="submit" name="action" value="decline" class="btn btn-danger">Decline</button>
                    </form>
                </div>
            </div>  --}}


</x-setting>
</x-app-layout>
