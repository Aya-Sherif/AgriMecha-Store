@extends('admin.layouts.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <!-- top tiles -->

        <!-- /page content -->
        <div class="card-body">
            <h1>Orders</h1>
            @include('admin.layouts.message')
            @if ($orders->isNotEmpty())
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>OrderID</th>
                                <th>User Name</th>
                                <th>Order Products</th>
                                <th>Order State</th>
                                <th>Recived At</th>
                                <th>---</th>
                                <th>Contact Number</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $order->id + 5000 }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>
                                        @foreach ($order->orderDetails as $detail)
                                            <li>{{ $detail->product_name }} - <strong>Quantity:</strong>
                                                {{ $detail->quantity }}</li>
                                            <!-- Access other order detail attributes as needed -->
                                        @endforeach
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.orderstate', $order->id) }}" method="post">
                                            @csrf
                                            <select name="state" onchange="this.form.submit()"
                                                style="background-color: {{ $order->state === 'waited' ? 'yellow' : ($order->state === 'Done' ? 'green' : 'Red') }};
                                                           color: {{ $order->state === 'pending' || $order->state === 'Done' ? 'white' : 'black' }};
                                                           padding: 5px 10px;
                                                           border: none;
                                                           border-radius: 5px;
                                                           cursor: pointer;">
                                                <option value="waited" {{ $order->state === 'waited' ? 'selected' : '' }}>
                                                    Pending</option>
                                                <option value="Done" {{ $order->state === 'Done' ? 'selected' : '' }}>Done
                                                </option>
                                                <option value="canceled"
                                                    {{ $order->state === 'canceled' ? 'selected' : '' }}>canceled</option>
                                                <!-- Add your third option here -->
                                            </select>
                                        </form>

                                    </td>

                                    <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                    <td></td>
                                    <td><a href="https://wa.me/{{ $order->user->phone }}" target="_blank">{{ $order->user->phone }}</a></td>


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
