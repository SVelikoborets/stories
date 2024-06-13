<x-layout>
<x-slot:title>
    {{ $story->title }}
    </x-slot>
    <div class="container">
        <h2>{{ $story->title }}</h2>
        <p>{{ $story->content }}</p>
        <h4>
            @foreach($tags as $tag)
                <a href="{{ route('story.tags', ['tag' =>$tag->id])}}">{{ $tag->name }}</a>
            @endforeach
        </h4>
            <p><a href="{{ route('main') }}">На главную</a></p>
    </div>
</x-layout>
