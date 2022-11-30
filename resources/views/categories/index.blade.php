@extends('index')

@section('page-title', 'categories')

@section('content')

    <a href="{{ route('categories.create') }}">create</a> <br> <br>

    <table>
        <tr>
            <th>id</th>
            <th>parent name</th>
            <th>name</th>
            <th>actions</th>
        </tr>
        @foreach ($categories as $category)
            <tr>
                <td>
                    {{ $category->id }}
                </td>
                <td>
                    {{ $category->parent->name ?? '' }}
                </td>
                <td>
                    <a href="{{ route('category_products', [
                        'id' => $category->id,
                    ]) }}">
                        {{ $category->name }}
                    </a>
                </td>
                <td>
                    <form action="{{ route('categories.edit', [
                        'id' => $category->id,
                    ]) }}" method="GET" @if ($category->id == 1) style="display: none;" @endif>
                        @csrf
                        @method('GET')

                        <button type="submit">
                            edit
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection