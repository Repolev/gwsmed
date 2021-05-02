@extends('frontend.layouts.master')
@section('title','Catalogs')
@section('content')


<div class="catalogue-section">
    <div class="container my-5">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 text-center">
                <div class="cv-heading">
                    <h1>Choose a <span>Catalogue</span></h1>
                    <hr class="border-bottom-line">
                </div>
            </div>

            <ul class="catalog-list">
                @foreach($catalogs as $catalog)
                    <li>
                        <a href ="{{ url($catalog->pdf_path) }}" target="_blank">
                            <img src="{{ $catalog->image_path }}" alt="{{ $catalog->title }}" height="200" width="200">
                            <h1>{{ $catalog->name }}</h1>
                        </a>
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
