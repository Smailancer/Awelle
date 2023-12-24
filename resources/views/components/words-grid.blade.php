@props(['words'])

<div class="lg:grid lg:grid-cols-4">

    {{-- Pin specific words by their spells --}}
    @foreach (['awelle', 'taghenjayt', 'taghenjayt'] as $pinnedspell)
        @foreach ($words as $word)
            @if ($word->spell === $pinnedspell)
                <x-word-card :word="$word"/>
            @endif
        @endforeach
    @endforeach

    {{-- Display the rest of the words --}}
    @foreach ($words as $word)

            <x-word-card :word="$word"/>

    @endforeach

</div>

