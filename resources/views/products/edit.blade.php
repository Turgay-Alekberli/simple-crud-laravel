@extends('index')

@section('page-title', 'create product')

@section('content')

    <form action="{{ route('products.update', [
        'id' => $product->id,
    ]) }}" method="post">
        @csrf
        @method('POST')

        @if (! $categories->isEmpty())
            <select name="category_id" id="">
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}" @selected($product->category_id == $item->id)>
                        {{ $item->name }}
                    </option>
                @endforeach
            </select> <br> <br>
        @endif

        <input type="text" name="name" value="{{ $product->name }}" placeholder="name" required autocomplete="off"> <br> <br>
        <input type="text" name="price" placeholder="price" value="{{ $product->price }}" required autocomplete="off"> <br> <br>

        <button type="submit">
            update
        </button>
    </form>

@endsection