<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <style>
        .cv-heading {
            text-align: center;
            max-width: 650px;
            margin: 0 auto 43px;
        }

        .cv-heading h1 {
            font-size: 28px;
            font-weight: 600;
            color: #AB292B;
            margin-bottom: 5px;
            text-transform: capitalize;
        }

        .border-bottom-line {
            width: 12%;
            height: 3px;
            background-color: #AB292B;
            border-radius: 4px;
        }

        ul.catalog-list {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-auto-rows: 24rem;
            column-gap: 2rem;
            list-style: none;
        }

        ul.catalog-list li a h1 {
            font-size: 16px;
            margin-top: 2rem;
            font-weight: 500;
            color: #000;
        }

        ul.catalog-list li a h1:hover {
            color: #AB292B;
            cursor: pointer;
        }



        ul.catalog-list li a img {
            transition: all 0.3s linear;
        }

        ul.catalog-list li a img:hover {
            transform: scale(1.1);
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="catalogue-section">
        <div class="container my-5">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-center">
                    <div class="cv-heading">
                        <h1>Choose a <span>Category</span></h1>
                        <hr class="border-bottom-line">
                    </div>
                </div>

                <ul class="catalog-list">
                    @foreach($catalog_category as $category)
                        <li>
                            @if(count($category->childCategories))
                                <a href ="{{ route('catalog.subcategory', $category->slug) }}">
                                    <img src="{{ $category->childCategories->first()->catalogs->first()->image_path }}" alt="{{ $category->title }}" height="200" width="200">
                                    <h1>{{ $category->title }}</h1>
                                </a>
                            @else
                                <a href ="{{ route('catalog.subcategory', $category->slug) }}">
                                    <img src="{{ $category->catalogs->first()->image_path }}" alt="{{ $category->title }}" height="200" width="200">
                                    <h1>{{ $category->title }}</h1>
                                </a>
                            @endif
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
</body>

</html>
