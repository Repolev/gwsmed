<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>{{ $data->title }} | Gws Med</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  </head>
  <body>
    <h2 class="mb-3">Name: {{ $data->title }}</h2>
    <h3>Category: {{ $data->category->title }}</h3>
    <img src="{{ $data->image_path }}" alt="{{ $data->title }}" height="400" width="400">
    <h3>{{ $data->price }}</h3>
    {!! $data->description !!}
    <footer>
        <img src="{{ asset('frontend/images/logo.png') }}" alt="GWS Med logo" height="200px" width="300px">
        <div style="text:center">
            Copyright &copy; <?php echo date('Y'); ?>. All Rights Reserved. GWS Surgicals LLP
        </div>
    </footer>
  </body>
</html>
