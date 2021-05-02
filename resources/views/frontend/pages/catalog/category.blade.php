@extends('frontend.layouts.master')
@section('title','Catalogs')
@section('content')


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

@endsection

@push('styles')
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2e5abf393162001291e431&product=inline-share-buttons' async='async'></script>
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2e5abf393162001291e431&product=inline-share-buttons' async='async'></script>
@endpush
