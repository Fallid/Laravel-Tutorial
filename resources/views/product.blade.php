<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product</title>
</head>

<body>
    <h1>List of Products</h1>
    @foreach ($products as $product)
        <h4>Product Name        : <span style="font-weight: normal">{{ $product->name }}</span> </h4>
        <h4>Product description : <span style="font-weight: normal">{{ $product->description }}</span> </h4>
        <h4>Product stock       : <span style="font-weight: normal">{{ $product->stock }}</span> </h4>
        <h4>Product Available at: <span style="font-weight: normal">{{ $product->store->name_store }}</span> </h4>
    @endforeach
</body>

</html>
