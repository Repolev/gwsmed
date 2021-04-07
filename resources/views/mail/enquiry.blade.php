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
{{--            @if(count($details->subject)>0)--}}

{{--            <p> My subject is : {{ $details['subject']}}. </p>--}}
{{--            @endif--}}
            @if($details['message'])


            <p> My message is: {{$details['message']}}. </p>
            @endif
            <p> My phone number is: {{$details['phone']}}. </p>
            @if($details['address'])

            <p> My address is: {{$details['address']}}. </p>
            @endif
            <h6>Categories:</h6>
{{--            @if($details->cats)--}}
{{--                <ul>--}}
{{--                    @foreach($details->cats as $cat)--}}
{{--                        <li>{{ucfirst($cat->title)}}</li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}

{{--            @endif--}}
            <p> We will contact you as soon as possible. </p>
            <br/>
            <br/>
            <p> Best Regards</p>
            <p> Team, GWS Surgicals LLP </p>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
