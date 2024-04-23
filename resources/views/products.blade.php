<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
</head>
<body>
    <h1>Product Management</h1>

    <h2>Products List</h2>
    <ul>
        @foreach ($products as $product)
            <li>{{ $product->title }} - {{ $product->cost }} - {{ $product->count_in_stock }}
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>

    <h2>Add New Product</h2>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Title">
        <input type="text" name="description" placeholder="Description">
        <input type="number" name="cost" placeholder="Cost">
        <input type="number" name="count_in_stock" placeholder="Count in Stock">
        <button type="submit">Add Product</button>
    </form>
    
</body>
</html>
