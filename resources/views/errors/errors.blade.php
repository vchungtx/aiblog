@extends('layouts.app')

@section('content')
<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- Post content -->
            <div class="col-md-8">
                <div class="section-row sticky-container">
                    <div class="main-post mce-content-body">

                        @yield('error-message')
                    </div>

                </div>

                <!-- ad -->
                @include('layouts.center-ad')
                <!-- ad -->


            </div>
            <!-- /Post content -->

            <!-- aside -->
            <div class="col-md-4">
                @include('layouts.aside-ad')
            </div>
            <!-- /aside -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->
@endsection

