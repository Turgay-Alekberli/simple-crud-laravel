@extends('index')

@section('page-title', 'products')

@section('content')

    <a href="{{ route('products.create') }}">create</a> <br> <br>

    <table>
        <tr>
            <th>id</th>
            <th>category</th>
            <th>name</th>
            <th>price</th>
            <th>actions</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>
                    {{ $product->id }}
                </td>
                <td>
                    <a href="{{ route('category_products', [
                        'id' => $product->category_id,
                    ]) }}">
                        {{ $product->category->name }}
                    </a>
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
@endsection