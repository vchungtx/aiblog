@extends('layouts.app')

@section('title')
Tổng hợp các Prompt và hình ảnh đẹp tạo bởi MidJourney mới nhất
@endsection

@section('head')
<meta name="title" content="Tổng hợp các Prompt và hình ảnh đẹp tạo bởi MidJourney mới nhất" />
<meta name="revisit-after" content="1 days" />
<meta name="robots" content="index,follow" />
<meta property="fb:app_id" content="" />
<meta property="og:site_name" content="AIBlog" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{Request::url()}}" />
<meta property="og:title" content="Tổng hợp các Prompt và hình ảnh đẹp tạo bởi MidJourney mới nhất" />
<meta property="og:description" content="Prompt Midjourney về các chủ đề nhân vật, cây cối, hoa quả..." />
<meta name="description" content="Prompt Midjourney về các chủ đề nhân vật, cây cối, hoa quả..." />
<meta name="keywords" content="AI, artificial intelligence, aiblog, tri tue nhan tao, chatgpt, chat gpt, midjourney mid journey, dalle, dall-e, did, d-id, prompt" />
@endsection

@section('page-header')
<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <ul class="page-header-breadcrumb">
                    <li><a href="/">Trang chủ</a></li>
                    <li><a href="/midjourney">MidJourney</a></li>
                    <li>Prompt MidJourney</li>
                </ul>
                <h1>Prompt MidJourney</h1>
            </div>
        </div>
    </div>
</div>
<!-- /Page Header -->
@endsection
@section('content')
<!-- The Modal -->
<div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01">
    <div id="caption"></div>
</div>
<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-8">
                <div class="row" id="posts-container">
                    @foreach ($prompts as $prompt)

                    @if ($loop->index == 0)
                    <!-- post -->
                    <div class="col-md-12">
                        <div class="post">

                            <div class="post-img"><img class="prompt-image"
                                    src="@if($prompt->image == null) /img/default-ai.jpg @elseif( !filter_var($prompt->image, FILTER_VALIDATE_URL)){{ Voyager::image( $prompt->image ) }}@else{{ $prompt->image }}@endif"
                                    alt="{{$prompt->content}}"></div>
                            <div class="post-body">
                                <p class="prompt-title">{{$prompt->content}}</p>
                            </div>
                        </div>
                    </div>
                    <!-- /post -->
                    @elseif ($loop->index )
                    <!-- post -->
                    <div class="col-md-6">
                        <div class="post">
                            <div class="post-img" ><img class="prompt-image"
                                    src="@if($prompt->image == null) /img/default-ai.jpg @elseif( !filter_var($prompt->image, FILTER_VALIDATE_URL)){{ Voyager::image( $prompt->image ) }}@else{{ $prompt->image }}@endif"
                                    alt=""></div>
                            <div class="post-body">
                                <p class="prompt-title">{{$prompt->content}}</p>
                            </div>
                        </div>
                    </div>
                    <!-- /post -->

                    @if (($loop->index) % 2 == 0)
                    <div class="clearfix visible-md visible-lg"></div>
                    @endif
                    @endif
                    @endforeach

                </div>
                @if(count($prompts) >= 19)
                <div class="col-md-12">
                    <div class="section-row">
                        <button id="load-more-btn" class="primary-button center-block">Tiếp theo</button>
                    </div>
                </div>
                @endif
            </div>

            <div class="col-md-4">
                @include('layouts.aside-prompt-category')
                @include('layouts.aside-ad')
                @include('layouts.aside-ad')
                @include('layouts.aside-ad')
                @include('layouts.aside-ad')
                @include('layouts.aside-ad')
                @include('layouts.aside-ad')
                @include('layouts.aside-ad')

            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->

@endsection

@section('footer')
<script>
    $(function() {
        var page = 2; // Starting page number for loading more posts
        var loading = false; // Variable to prevent multiple simultaneous AJAX requests
        var endOfPosts = false; // Variable to indicate if all posts have been loaded

        function loadMorePosts() {
            if (loading || endOfPosts) {
                return; // Don't proceed if already loading or all posts have been loaded
            }

            loading = true;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/midjourney/prompt/load-more', // Replace with the URL of your Laravel route for loading more posts
                method: 'POST',
                data: {
                    page: page,
                },
                success: function(response) {
                    if (response.prompts.length > 0) {
                        // Append the loaded posts to the container
                        $('#posts-container').append(response.prompts);
                        page++; // Increment the page number for the next load
                        loading = false;

                        if (response.jsonData.current_page == response.jsonData.last_page) {
                            endOfPosts = true;
                            $('#load-more-btn').hide(); // Hide the button if all posts have been loaded
                        }
                    } else {
                        endOfPosts = true;
                        $('#load-more-btn').hide(); // Hide the button if all posts have been loaded
                    }
                },
                error: function() {
                    loading = false;
                },
            });
        }

       // Trigger the loadMorePosts function on button click
        $('#load-more-btn').click(loadMorePosts);
    });
</script>

<script>
    $(function() {
        var modal = $('#myModal');
        var captionText = $('#caption');
        function showImage(){
            modal.css('display', 'block');
            $('#img01').attr('src', $(this).attr('src'));

        }
        function hideImage(){
            modal.css('display', 'none');
        }
        modal.click(function(e) {
            if (e.target !== this)
                return;
            hideImage();
        });
        $('.prompt-image').click(showImage)
        $('.close').click(hideImage);
    });




</script>
@endsection
