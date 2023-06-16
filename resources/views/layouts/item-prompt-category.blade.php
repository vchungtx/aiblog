@foreach ($prompts as $prompt)
<!-- post -->
<div class="col-md-6">
    <div class="post">
        <div class="post-img"><img
                src="@if( !filter_var($prompt->image, FILTER_VALIDATE_URL)){{ Voyager::image( $prompt->image ) }}@else{{ $prompt->image }}@endif"
                alt="" ></div>
        <div class="post-body">
            <p class="prompt-title">{{$prompt->content}}</a></p>
        </div>
    </div>
</div>
<!-- /post -->
@endforeach
