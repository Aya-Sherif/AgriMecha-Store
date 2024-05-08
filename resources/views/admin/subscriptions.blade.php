@extends('admin.layouts.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <!-- top tiles -->

        <!-- /page content -->
        <div class="card-body">
            <h1>Subscriptions</h1>

            @include('admin.layouts.message')
            @if ($subs->isNotEmpty())
                <div class="table-responsive">
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Email</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subs as $sub)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $sub->email }}</td>


                                    {{-- <td>
                                        <form action="{{ route('admin.blogs.destroy', $post->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"> Delete</button>

                                        </form>                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h3> There are no Subscriptions yet</h3>
            @endif
        </div>
    </div>

    </div>
@endsection



