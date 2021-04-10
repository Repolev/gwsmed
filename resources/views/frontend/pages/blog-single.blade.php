@extends('frontend.layouts.master')
@section('meta_description', $blog->meta_description)
@section('meta_title', $blog->meta_title)

@section('content')

    <!-- breadcrumb start -->
    <div class="cv-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cv-breadcrumb-box">
                        <h1>{{ucfirst($blog->title)}}</h1>
                        <ul>
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><a href="{{route('blog')}}">Blogs</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->
    <!-- blog start -->
    <div class="cv-blog-single spacer-top spacer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="cv-blog-single-box">
                        <div class="cv-blog-img">
                            <img src="{{asset($blog->image_path)}}" alt="{{$blog->title}}" class="img-fluid"/>
                        </div>
                        <div class="cv-blog-data">
                            <a href="javascript:;" class="cv-blog-date">{{\Carbon\Carbon::parse($blog->created_at)->format('d M Y')}}</a>
                            <h2 class="cv-blog-title">{{ucfirst($blog->title)}}</h2>
                           {!! html_entity_decode($blog->content) !!}
                        </div>
                    </div>

                    <div class="cv-blog-comment">
                        <h2 class="cv-sidebar-title">Comment ({{ count($blog->comments) }})</h2>
                        @if (count($blog->comments) > 0)
                        <ul>
                        @foreach ($blog->comments as $comment)
                            <li>
                                <div class="cv-comment-box">
                                    <div class="cv-comment-text">
                                        <h3>{{ $comment->name }}</h3>
                                        <a href="javascript:;" class="cv-cmnt-date">{{ \Carbon\Carbon::parse($comment->created_at)->format('d, M Y') }}</a>
                                        <p>{{ $comment->comment }}</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                        </ul>

                        @else
                            <p>No Comments Yet. Be the first one.</p>
                        @endif
                    </div>
                    <div class="cv-blog-cmnt-reply">
                        <h2 class="cv-sidebar-title">Leave a Comment</h2>
                        <form action="{{ route('commentBlog', $blog->id) }}" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="name" placeholder="Enter Your Name"/>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="email" placeholder="Enter Your Email"/>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="website" placeholder="Enter Your Website"/>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="contact" placeholder="Enter Your Contact"/>
                                </div>
                                <div class="col-md-12">
                                    <textarea placeholder="Comment Here" name="comment"></textarea>
                                </div>
                            </div>
                            <button class="cv-btn" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cv-blog-sidebar">
                        <div class="cv-widget cv-product-category">
                            <h2 class="cv-sidebar-title">Recent Post</h2>
                            @if(count($blogs)>0)
                            <ul>
                                @foreach($blogs as $item)
                                    @if($blog->id!=$item->id)
                                        <li><a href="{{route('blog.detail',$item->slug)}}">{{ucfirst($item->title)}}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog end -->


@endsection
