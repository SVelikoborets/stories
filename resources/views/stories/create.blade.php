<x-layout>
<x-slot:title>
    Создание истории
</x-slot>
    <form action="{{ route('store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="txtTitle" class="form-label">Заголовок:</label>
            <input name="title" id="txtTitle" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}">
            @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="txtContent" class="form-label">Интересная история:</label>
            <textarea name="content" id="txtContent" class="form-control @error('content') is-invalid @enderror" row="3">{{ old('content') }}</textarea>
            @error('content')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tags" class="form-label">Хеш-теги</label>
            <input name="tags" id="tags" class="form-control @error('tags') is-invalid @enderror" value="{{old('tags')}}">
            @error('tags')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <input type="submit" class="btn btn-primary" value="Добавить">
    </form>
</x-layout>
