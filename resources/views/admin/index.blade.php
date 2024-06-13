<x-layout>

    <x-slot:title>
        Истории
    </x-slot>

    @if (count($stories) > 0)
        <table class="table table-striped table-borderless">
            <thead>
                <tr>
                    <th>Название</th>
                    <th></th>
                    <th>Теги</th>
                    <th>Статус</th>
                    <th colspan="2">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stories as $story)
                    <tr>
                        <td>
                            <h3>{{ $story->title }}</h3>
                        </td>
                        <td>
                            <button type="button" class="btn btn-light">
                                <a class ="blue-link" href="{{ route('admin.story', ['story' => $story->id])}}">Читать</a>
                            </button>
                        </td>
                        <td>
                    @foreach($story->tags as $tag)
                            <button type="button" class="btn btn-light">
                                    <a class ="blue-link" href="{{ route('admin.tags', ['tag' =>$tag->id])}}">{{ $tag->name }}</a>
                                </button>
                        @endforeach
                        </td>
                        <td>
                            {{$story->status}}
                        </td>
                            @if($story->status =='в обработке')
                                <td>
                                    <button type="button" class="btn btn-primary">
                                        <a class ="form-link" href="{{ route('approve', ['story' => $story->id])}}">Принять</a>
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger">
                                        <a class ="form-link" href="{{ route('reject', ['story' => $story->id] )}}">Отклонить</a>
                                    </button>
                                </td>
                            @elseif($story->status =='принято')
                                <td>
                                    <button type="button" class="btn btn-danger">
                                        <a class ="form-link" href="{{ route('reject', ['story' => $story->id] )}}">Отклонить</a>
                                    </button>
                                </td>
                            @else
                                <td>
                                    <button type="button" class="btn btn-primary">
                                        <a class ="form-link" href="{{ route('approve', ['story' => $story->id])}}">Принять</a>
                                    </button>
                                </td>
                           @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</x-layout>
