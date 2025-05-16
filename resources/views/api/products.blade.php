<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
 <!-- Bootstrap 5 CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
 <!-- Font Awesome -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center my-4">Products from API</h1>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Price</th>
                <th scope="col">Rating</th>
                <th scope="col">Brand</th>
                </tr>

            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    {{-- <th scope="row">{{ $loop->iteration }}</th> --}}
                    <td>{{ $product['id'] }}</td>
                    <td>{{$product['title']}}</td>
              {{-- "{{ asset('images/' . $product['thumbnail']) }} --}}
                    <td><img src="{{ $product['thumbnail'] }}" alt="" width="100"></td>
                    <td>${{ number_format($product['price'], 2) }}</td>
                    <td>{{ $product['rating']}}</td>
                    <td>{{ $product['brand'] ?? 'N/A' }}</td>

                </tr>
                @endforeach
            <tbody id="products-list">
                <!-- Products will be dynamically loaded here -->
            </tbody>
            </table>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            fetch('/api/products')
                .then(response => response.json())
                .then(data => {
                    const productsList = document.getElementById('products-list');
                    data.forEach(product => {
                        const productDiv = document.createElement('div');
                        productDiv.classList.add('product', 'mb-3', 'p-3', 'border');
                        productDiv.innerHTML = `
                            <h2>${product.name}</h2>
                            <p>${product.description}</p>
                            <p><strong>Price:</strong> $${product.price}</p>
                        `;
                        productsList.appendChild(productDiv);
                    });
                })
                .catch(error => console.error('Error fetching products:', error));
        });
    </script>
</body>
</html>
