@props(['words'])

<div class="lg:grid lg:grid-cols-4">

    {{-- Pin specific words by their spells --}}
    @foreach (['Awelle', 'Aman', '9im'] as $pinnedspell)
        @foreach ($words as $word)
            @if ($word->spell === $pinnedspell)
                <x-word-card :word="$word"/>
            @endif
        @endforeach
    @endforeach

    {{-- Display the rest of the words excluding the pinned ones --}}
    @foreach ($words as $word)
        @php
            // Check if the current word is among the pinned words
            $isPinned = in_array($word->spell, ['awelle', 'Aman', '9im']);
        @endphp

        {{-- Skip this word if it's already pinned --}}
        @unless($isPinned)
            <x-word-card :word="$word"/>
        @endunless
    @endforeach

</div>
