@extends('index')

@section('page-title', 'create product')

@section('content')

    <form action="{{ route('products.store') }}" method="post">
        @csrf
        @method('POST')

        @if (! $categories->isEmpty())
            <select name="category_id" id="">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select> <br> <br>
        @endif

        <input type="text" name="name" placeholder="name" required autocomplete="off"> <br> <br>
        <input type="text" name="price" placeholder="price" required autocomplete="off"> <br> <br>

        <button type="submit">
            save
        </button>
    </form>

@endsection