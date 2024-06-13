<x-layout>
<x-slot:title>
    {{ $story->title }}
    </x-slot>
    <div class="container">
        <h2>{{ $story->title }}</h2>
        <p>{{ $story->content }}</p>
        <h4>
            @foreach($tags as $tag)
                <a href="{{ route('admin.tags', ['tag' =>$tag->id])}}">{{ $tag->name }}</a>
            @endforeach
        </h4>
        <button type="button" class="btn btn-primary">
            <a  class ="form-link" href="{{ route('approve', ['story' => $story->id])}}">Принять</a>
        </button>
        <button type="button" class="btn btn-secondary">
            <a class ="form-link" href="{{ route('reject', ['story' => $story->id] )}}">Отклонить</a>
        </button>
            <p><a href="{{ route('admin') }}">На главную</a></p>
    </div>
</x-layout>
