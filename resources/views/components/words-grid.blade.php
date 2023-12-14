@props(['words'])

<div class="lg:grid lg:grid-cols-4">

    {{-- Pin specific words by their slugs --}}
    @foreach (['awelle', 'Adhlamdagh', 'taghenjayt'] as $pinnedSlug)
        @foreach ($words as $word)
            @if ($word->slug === $pinnedSlug)
                <x-word-card :word="$word"/>
            @endif
        @endforeach
    @endforeach

    {{-- Display the rest of the words --}}
    @foreach ($words as $word)
        @if (!in_array($word->slug, ['slug1', 'slug2', 'slug3']))
            <x-word-card :word="$word"/>
        @endif
    @endforeach

</div>

