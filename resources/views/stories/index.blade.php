<x-layout>
    <x-slot:title>
        Главная
    </x-slot>

    @if(count($stories)>0)
    <table class="table table-striped table-borderless">

        <thead>
            <th>Название</th>
            <th>Хеш-теги</th>
            <th></th>
        </thead>

        <tbody>
            @foreach($stories as $story)
            <tr>
                <td>
                    <h4>{{ $story->title }}</h4>
                </td>
                <td>
                    @forelse($story->tags as $tag)
                        <a href="{{ route('story.tags', ['tag' =>$tag->id])}}">{{ $tag->name }}</a>
                    @empty
                        <p>нету</p>
                    @endforelse
               </td>
                <td>
                    <button type="button" class="btn btn-light">
                        <a class ="blue-link" href="{{ route('story', ['story' => $story->id])}}">Читать</a>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</x-layout>

