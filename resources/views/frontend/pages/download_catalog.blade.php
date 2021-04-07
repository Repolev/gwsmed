<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $product->title }} | Gws Med</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  </head>
  <body>
    <h2 class="mb-3">Name: {{ $product->title }}</h2>
    <img src="{{ $product->image_path }}" alt="{{ $product->title }}" height="400" width="400">
    <h3>Category: @foreach($product->categories as $category) {{ $category->title . ',' }} @endforeach</h3>
    <h3>Price: {{ $product->price }}</h3>
    {!! $product->description !!}
    <footer>
        <img src="{{ asset('frontend/images/logo.png') }}" alt="GWS Med logo" height="200px" width="300px">
        <div style="text:center">
            Copyright &copy; <?php echo date('Y'); ?>. All Rights Reserved. GWS Surgicals LLP
        </div>
    </footer>
  </body>
</html>
