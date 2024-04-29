@extends('admin.layouts.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Post Page</h3>
                </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>{{ $post->title }}</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            @php
                                $content = json_decode($post->content, true);
                            @endphp
                            @if ($content)
                                @foreach ($content as $key => $value)
                                    <h3> {{ $key }}</h3> <br>
                                    {{ $value }} <br>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
