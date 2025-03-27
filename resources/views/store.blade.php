<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <h1>Outles Stores</h1>
    <table style="border-style: dashed">
        <thead>
            <tr>
                <th>Name Store</th>
                <th>Product Available</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stores as $store)
                <tr>
                    <td>
                        {{ $store->name_store }}
                    </td>
                        <td style="background-color: yellow">
                            <ul class="product-list">
                                @foreach ($store->products as $product)
                                    <li>{{ $product->name }}</li>
                                @endforeach
                        </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
