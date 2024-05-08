@extends('admin.layouts.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <!-- top tiles -->

        <!-- /page content -->
        <div class="card-body">
            <h1>Messages</h1>
            @include('admin.layouts.message')
            @if ($messages->isNotEmpty())
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Message</th>
                                <th>Sent At</th>
                                <th>State</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($messages as $message)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $message->name }}</td>
                                    <td>{{ $message->email }}</td>
                                    <td><a href="https://wa.me/{{ $message->phone }}" target="_blank">{{ $message->phone }}</a></td>
                                    <td>{{ $message->message }}</td>

                                    <td>{{ $message->created_at->format('Y-m-d H:i:s') }}</td>
                                    <td>
                                        <form action="{{ route('admin.messages.update', $message->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <select name="state" onchange="this.form.submit()"
                                                style="background-color: {{ $message->state === 'pending' ? 'red' : 'green' }};
                                                       color: white;
                                                       padding: 5px 10px;
                                                       border: none;
                                                       border-radius: 5px;
                                                       cursor: pointer;">
                                                <option value="pending" {{ $message->state === 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="Done" {{ $message->state === 'Done' ? 'selected' : '' }}>Done</option>
                                            </select>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <h3>There are no messages yet</h3>
            @endif
        </div>
    </div>
@endsection
