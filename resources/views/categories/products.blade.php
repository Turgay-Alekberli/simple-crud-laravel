@extends('index')

@section('page-title', 'categories and products')

@section('content')

    <a href="{{ route('categories.create') }}">create category</a> <br> <br>
    <a href="{{ route('products.create') }}">create product</a> <br> <br>

    @foreach ($categories as $category)
        <h2>
            {{ $category->name }}
        </h2>

        <table>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>price</th>
                <th>actions</th>
            </tr>
            @foreach ($category->products as $product)
                <tr>
                    <td>
                        {{ $product->id }}
                    </td>
                    <td>
                        {{ $product->name }}
                    </td>
                    <td>
                        {{ $product->price }}
                    </td>
                    <td>
                        <form action="{{ route('products.edit', [
                            'id' => $product->id,
                        ]) }}" method="GET">
                            @csrf
                            @method('GET')

                            <button type="submit">
                                edit
                            </button>
                        </form>

                        <form action="{{ route('products.destroy', [
                            'id' => $product->id,
                        ]) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit">
                                delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @endforeach
@endsection