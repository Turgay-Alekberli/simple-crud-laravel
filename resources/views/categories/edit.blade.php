@extends('index')

@section('page-title', 'edit category')

@section('content')

    <form action="{{ route('categories.update', [
        'id' => $category->id,
    ]) }}" method="post">
        @csrf
        @method('POST')

        @if (! $categories->isEmpty())
            <select name="parent_id" id="">
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}" @selected($category->parent_id == $item->id)>
                        {{ $item->name }}
                    </option>
                @endforeach
            </select> <br> <br>
        @endif

        <input type="text" name="name" value="{{ $category->name }}" required autocomplete="off"> <br> <br>

        <button type="submit">
            update
        </button>
    </form>

@endsection