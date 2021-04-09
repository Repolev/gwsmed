<!doctype html>
<html lang="en">
<head>
    <title>Order confirmation mail</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-sm-12 m-auto">
            <h3>Enquiry Form</h3>
            <p> My name is, {{$details['full_name']}}</p>
            @if($details['message'])
            <p> My message is: {{$details['message']}}. </p>
            @endif
            <p> My phone number is: {{$details['phone']}}. </p>
            @if($details['address'])

            <p> My address is: {{$details['address']}}. </p>
            @endif
            <h6>Categories:</h6>
            @if($details->cats)
            <div class="card">
                <div class="card-body">
                    <ul>
                        @foreach($details->cats as $category)
                            <li>{{ucfirst($category->title)}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

</body>
</html>
