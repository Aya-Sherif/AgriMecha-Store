@extends('admin.layouts.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <!-- top tiles -->

        <!-- /page content -->
        <div class="card-body">
            <h1>Blogs</h1>
            @include('admin.layouts.message')
            @if ($posts->isNotEmpty())
                <div class="table-responsive">
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>title</th>
                                <th>subtitle</th>
                                <th>content</th>
                                <th>Image</th>
                                <th>Created At</th>
                                <th>Edit</th>
                                <th>Delete</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->subtitle }}</td>

                                    @php
                                    $content = json_decode($post->content, true);
                                @endphp
                                    <td>
<a href="{{route('admin.blogs.show',$post->id)}}"> View Post Content</a>
                                    </td>


                                    <td>
                                        <img src="{{ asset('front/img/blog_imgs') }}/{{ $post->image }}"
                                            style="max-width: 100px;">
                                    </td>

                                    <td>{{ $post->created_at->format('F j, Y') }}</td> <!-- Format the creation date -->
                                    <td><a href="{{ route('admin.blogs.edit', $post->id) }}" class="btn btn-info">Edit
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.blogs.destroy', $post->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"> Delete</button>

                                        </form>                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h3> There are no blogs yet</h3>
            @endif
        </div>
    </div>

    </div>
@endsection



