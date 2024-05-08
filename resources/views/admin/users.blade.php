@extends('admin.layouts.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <!-- top tiles -->

        <!-- /page content -->
        <div class="card-body">
            <h1>Users</h1>
            @include('admin.layouts.message')
            @if ($users->isNotEmpty())
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Orders</th>
                                <th>Government</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{$orders[$user->id]}}</td>
                                    <td>{{ $user->governorate }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <h3>There are no users yet</h3>
            @endif
        </div>
    </div>
@endsection
