<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        table, th, td {
            border:1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li>
                <a href="{{ route('index') }}">
                    home
                </a>
            </li>
            <li>
                <a href="{{ route('categories.index') }}">
                    categories
                </a>
            </li>
            <li>
                <a href="{{ route('products.index') }}">
                    products
                </a>
            </li>
        </ul>
    </nav>

    <div class="container">
        <h1>
            @yield('page-title')
        </h1>

        @yield('content')
    </div>

</body>
</html>