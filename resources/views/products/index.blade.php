<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>Products</h1>
    <div>
        @if (session()->has('success'))
            <div>
                {{session('success')}}
            </div>

        @endif
    </div>
    <div>
        <a href="{{route('product.create')}}">Create Product</a>
    </div>
    <div>index</div>
    <div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>

                @foreach ( $products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->qty}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->description}}</td>
                        <td>
                            <a href="{{route('product.edit', $product->id)}}">Edit</a>
                        </td>
                        <td>
                            <form method="post" action="{{route('product.delete', $product->id)}}">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tr>
        </table>
    </div>
</body>
</html>
