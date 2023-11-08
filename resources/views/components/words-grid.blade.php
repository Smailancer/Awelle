@props(['words'])


    <div class="lg:grid lg:grid-cols-3">
        @foreach ($words as $word)
            <x-word-card
                :word="$word"
            />
        @endforeach
    </div>

