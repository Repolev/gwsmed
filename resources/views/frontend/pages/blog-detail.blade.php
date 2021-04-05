@extends('frontend.layouts.master')

@section('title','E-TECH || Blog Detail page')

@section('main-content')
    <!-- breadcrumb start -->
    <div class="cv-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cv-breadcrumb-box">
                        <h1>Blog Single</h1>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Blog Single</li>
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
                <div class="col-lg-12">
                    <div class="cv-blog-single-box">
                        <div class="cv-blog-img">
                            <img src="{{$post->photo}}" alt="{{$post->photo}}">
                        </div>
                        <div class="cv-blog-data">
                            <a href="javascript:;" class="cv-blog-date">{{$post->created_at->format('M d, Y')}}</a>
                            <h2 class="cv-blog-title">{{$post->title}}</h2>
                           @if($post->quote)
                                        <blockquote> <i class="fa fa-quote-left"></i> {!! ($post->quote) !!}</blockquote>
                                        @endif
                        </div>
                       
                    
						
						
                                        <p>{!! ($post->description) !!}</p>
                    </div>
                    <div class="cv-blog-comment">
                        <h2 class="cv-sidebar-title">Comment ({{$post->allComments->count()}})</h2>
                        <ul>
                            <li>
                                <div class="cv-comment-box">
                                    <div class="cv-comment-img">
                                        <img src="https://via.placeholder.com/100x100" alt="image" class="img-fluid">
                                    </div>
                                    <div class="cv-comment-text">
                                        <h3>John Michel</h3>
                                        <a href="javascript:;" class="cv-cmnt-date">1 June, 2020</a>
                                        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat aute irure dolor in reprehenderit.</p>
                                        <a href="javascript:;" class="cv-cmnt-reply">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.633 511.633">
                                            	<g>
                                            		<path d="M463.375,183.726c-35.782-36.735-92.789-57.764-171.02-63.094V45.83c0-7.994-3.713-13.608-11.136-16.846
                                            			c-7.803-3.23-14.466-1.902-19.985,3.999L115.06,179.161c-3.618,3.621-5.424,7.902-5.424,12.85c0,4.949,1.807,9.229,5.424,12.847
                                            			l146.178,146.177c3.432,3.617,7.71,5.425,12.85,5.425c2.283,0,4.661-0.476,7.136-1.427c7.423-3.238,11.139-8.847,11.139-16.845
                                            			v-71.663c30.642,2.475,56.097,7.471,76.376,14.989c20.27,7.519,36.494,18.034,48.677,31.549
                                            			c28.362,31.405,38.451,85.171,30.266,161.311c-0.376,4.951,1.807,8.186,6.567,9.708c0.571,0.192,1.427,0.284,2.569,0.284
                                            			c3.806,0,6.468-1.618,7.994-4.853l5.709-11.42c2.662-5.331,6.516-13.945,11.56-25.841c5.041-11.901,9.616-23.794,13.709-35.692
                                            			c4.093-11.893,7.755-25.026,10.992-39.396c3.234-14.376,4.853-27.079,4.853-38.116
                                            			C511.63,265.094,495.546,216.657,463.375,183.726z"></path>
                                            		<path d="M63.953,192.011c0-4.952,1.809-9.233,5.424-12.85L182.725,65.531V45.83c0-7.994-3.715-13.608-11.138-16.846
                                            			c-7.804-3.23-14.465-1.902-19.983,3.999L5.424,179.161C1.809,182.781,0,187.062,0,192.011c0,4.949,1.809,9.229,5.424,12.847
                                            			l146.18,146.177c3.425,3.617,7.708,5.425,12.85,5.425c2.284,0,4.663-0.476,7.137-1.427c7.423-3.238,11.138-8.847,11.138-16.845
                                            			v-19.985L69.377,204.857C65.762,201.24,63.953,196.962,63.953,192.011z"></path>
                                            	</g>
                                            </svg>
                                        Reply</a>
                                    </div>
                                </div>   
                                <ul>
                                    <li>
                                        <div class="cv-comment-box">
                                            <div class="cv-comment-img">
                                                <img src="https://via.placeholder.com/100x100" alt="image" class="img-fluid">
                                            </div>
                                            <div class="cv-comment-text">
                                                <h3>Michel John</h3>
                                                <a href="javascript:;" class="cv-cmnt-date">1 June, 2020</a>
                                                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat aute irure dolor in reprehenderit.</p>
                                                <a href="javascript:;" class="cv-cmnt-reply">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.633 511.633">
                                                        <g>
                                                            <path d="M463.375,183.726c-35.782-36.735-92.789-57.764-171.02-63.094V45.83c0-7.994-3.713-13.608-11.136-16.846
                                                                c-7.803-3.23-14.466-1.902-19.985,3.999L115.06,179.161c-3.618,3.621-5.424,7.902-5.424,12.85c0,4.949,1.807,9.229,5.424,12.847
                                                                l146.178,146.177c3.432,3.617,7.71,5.425,12.85,5.425c2.283,0,4.661-0.476,7.136-1.427c7.423-3.238,11.139-8.847,11.139-16.845
                                                                v-71.663c30.642,2.475,56.097,7.471,76.376,14.989c20.27,7.519,36.494,18.034,48.677,31.549
                                                                c28.362,31.405,38.451,85.171,30.266,161.311c-0.376,4.951,1.807,8.186,6.567,9.708c0.571,0.192,1.427,0.284,2.569,0.284
                                                                c3.806,0,6.468-1.618,7.994-4.853l5.709-11.42c2.662-5.331,6.516-13.945,11.56-25.841c5.041-11.901,9.616-23.794,13.709-35.692
                                                                c4.093-11.893,7.755-25.026,10.992-39.396c3.234-14.376,4.853-27.079,4.853-38.116
                                                                C511.63,265.094,495.546,216.657,463.375,183.726z"></path>
                                                            <path d="M63.953,192.011c0-4.952,1.809-9.233,5.424-12.85L182.725,65.531V45.83c0-7.994-3.715-13.608-11.138-16.846
                                                                c-7.804-3.23-14.465-1.902-19.983,3.999L5.424,179.161C1.809,182.781,0,187.062,0,192.011c0,4.949,1.809,9.229,5.424,12.847
                                                                l146.18,146.177c3.425,3.617,7.708,5.425,12.85,5.425c2.284,0,4.663-0.476,7.137-1.427c7.423-3.238,11.138-8.847,11.138-16.845
                                                                v-19.985L69.377,204.857C65.762,201.24,63.953,196.962,63.953,192.011z"></path>
                                                        </g>
                                                    </svg>
                                                Reply</a>
                                            </div>
                                        </div>   
                                    </li>
                                    <li>
                                        <div class="cv-comment-box">
                                            <div class="cv-comment-img">
                                                <img src="https://via.placeholder.com/100x100" alt="image" class="img-fluid">
                                            </div>
                                            <div class="cv-comment-text">
                                                <h3>John Michel</h3>
                                                <a href="javascript:;" class="cv-cmnt-date">1 June, 2020</a>
                                                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat aute irure dolor in reprehenderit.</p>
                                                <a href="javascript:;" class="cv-cmnt-reply">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.633 511.633">
                                                        <g>
                                                            <path d="M463.375,183.726c-35.782-36.735-92.789-57.764-171.02-63.094V45.83c0-7.994-3.713-13.608-11.136-16.846
                                                                c-7.803-3.23-14.466-1.902-19.985,3.999L115.06,179.161c-3.618,3.621-5.424,7.902-5.424,12.85c0,4.949,1.807,9.229,5.424,12.847
                                                                l146.178,146.177c3.432,3.617,7.71,5.425,12.85,5.425c2.283,0,4.661-0.476,7.136-1.427c7.423-3.238,11.139-8.847,11.139-16.845
                                                                v-71.663c30.642,2.475,56.097,7.471,76.376,14.989c20.27,7.519,36.494,18.034,48.677,31.549
                                                                c28.362,31.405,38.451,85.171,30.266,161.311c-0.376,4.951,1.807,8.186,6.567,9.708c0.571,0.192,1.427,0.284,2.569,0.284
                                                                c3.806,0,6.468-1.618,7.994-4.853l5.709-11.42c2.662-5.331,6.516-13.945,11.56-25.841c5.041-11.901,9.616-23.794,13.709-35.692
                                                                c4.093-11.893,7.755-25.026,10.992-39.396c3.234-14.376,4.853-27.079,4.853-38.116
                                                                C511.63,265.094,495.546,216.657,463.375,183.726z"></path>
                                                            <path d="M63.953,192.011c0-4.952,1.809-9.233,5.424-12.85L182.725,65.531V45.83c0-7.994-3.715-13.608-11.138-16.846
                                                                c-7.804-3.23-14.465-1.902-19.983,3.999L5.424,179.161C1.809,182.781,0,187.062,0,192.011c0,4.949,1.809,9.229,5.424,12.847
                                                                l146.18,146.177c3.425,3.617,7.708,5.425,12.85,5.425c2.284,0,4.663-0.476,7.137-1.427c7.423-3.238,11.138-8.847,11.138-16.845
                                                                v-19.985L69.377,204.857C65.762,201.24,63.953,196.962,63.953,192.011z"></path>
                                                        </g>
                                                    </svg>
                                                Reply</a>
                                            </div>
                                        </div>   
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <div class="cv-comment-box">
                                    <div class="cv-comment-img">
                                        <img src="https://via.placeholder.com/100x100" alt="image" class="img-fluid">
                                    </div>
                                    <div class="cv-comment-text">
                                        <h3>Nikki Bela</h3>
                                        <a href="javascript:;" class="cv-cmnt-date">1 June, 2020</a>
                                        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat aute irure dolor in reprehenderit.</p>
                                        <a href="javascript:;" class="cv-cmnt-reply">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.633 511.633">
                                            	<g>
                                            		<path d="M463.375,183.726c-35.782-36.735-92.789-57.764-171.02-63.094V45.83c0-7.994-3.713-13.608-11.136-16.846
                                            			c-7.803-3.23-14.466-1.902-19.985,3.999L115.06,179.161c-3.618,3.621-5.424,7.902-5.424,12.85c0,4.949,1.807,9.229,5.424,12.847
                                            			l146.178,146.177c3.432,3.617,7.71,5.425,12.85,5.425c2.283,0,4.661-0.476,7.136-1.427c7.423-3.238,11.139-8.847,11.139-16.845
                                            			v-71.663c30.642,2.475,56.097,7.471,76.376,14.989c20.27,7.519,36.494,18.034,48.677,31.549
                                            			c28.362,31.405,38.451,85.171,30.266,161.311c-0.376,4.951,1.807,8.186,6.567,9.708c0.571,0.192,1.427,0.284,2.569,0.284
                                            			c3.806,0,6.468-1.618,7.994-4.853l5.709-11.42c2.662-5.331,6.516-13.945,11.56-25.841c5.041-11.901,9.616-23.794,13.709-35.692
                                            			c4.093-11.893,7.755-25.026,10.992-39.396c3.234-14.376,4.853-27.079,4.853-38.116
                                            			C511.63,265.094,495.546,216.657,463.375,183.726z"></path>
                                            		<path d="M63.953,192.011c0-4.952,1.809-9.233,5.424-12.85L182.725,65.531V45.83c0-7.994-3.715-13.608-11.138-16.846
                                            			c-7.804-3.23-14.465-1.902-19.983,3.999L5.424,179.161C1.809,182.781,0,187.062,0,192.011c0,4.949,1.809,9.229,5.424,12.847
                                            			l146.18,146.177c3.425,3.617,7.708,5.425,12.85,5.425c2.284,0,4.663-0.476,7.137-1.427c7.423-3.238,11.138-8.847,11.138-16.845
                                            			v-19.985L69.377,204.857C65.762,201.24,63.953,196.962,63.953,192.011z"></path>
                                            	</g>
                                            </svg>
                                        Reply</a>
                                    </div>
                                </div>   
                            </li>
                        </ul>
                    </div>
                    <div class="cv-blog-cmnt-reply">
                        <h2 class="cv-sidebar-title">leave a reply</h2>
                        <form>
                            <input type="text" placeholder="Enter Your Name"/>
                            <input type="text" placeholder="Enter Your Email"/>
                            <input type="text" placeholder="Enter Your Subject"/>
                            <textarea placeholder="Message Here"></textarea>
                            <button class="cv-btn">Submit</button>
                        </form>
                    </div>
                </div>
              
		   </div>
        </div>
    </div>
    <!-- blog end -->
   

	
	@endsection
@push('styles')
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2e5abf393162001291e431&product=inline-share-buttons' async='async'></script>
@endpush
@push('scripts')
<script>
$(document).ready(function(){
    
    (function($) {
        "use strict";

        $('.btn-reply.reply').click(function(e){
            e.preventDefault();
            $('.btn-reply.reply').show();

            $('.comment_btn.comment').hide();
            $('.comment_btn.reply').show();

            $(this).hide();
            $('.btn-reply.cancel').hide();
            $(this).siblings('.btn-reply.cancel').show();

            var parent_id = $(this).data('id');
            var html = $('#commentForm');
            $( html).find('#parent_id').val(parent_id);
            $('#commentFormContainer').hide();
            $(this).parents('.comment-list').append(html).fadeIn('slow').addClass('appended');
          });  

        $('.comment-list').on('click','.btn-reply.cancel',function(e){
            e.preventDefault();
            $(this).hide();
            $('.btn-reply.reply').show();

            $('.comment_btn.reply').hide();
            $('.comment_btn.comment').show();

            $('#commentFormContainer').show();
            var html = $('#commentForm');
            $( html).find('#parent_id').val('');

            $('#commentFormContainer').append(html);
        });
        
 })(jQuery)
})
</script>
@endpush