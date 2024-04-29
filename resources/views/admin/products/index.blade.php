@extends('admin.layouts.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <!-- top tiles -->

        <!-- /page content -->
        <div class="card-body">
            <h1>Products</h1>
            @include('admin.layouts.message')
            @if ($products->isNotEmpty())
                <div class="table-responsive">
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Model Name</th>
                                <th>Quantity</th>
                                <th>Discount</th>
                                <th>Description</th>
                                <th>Addition</th>
                                <th>Image</th>
                                <th>PDF Link</th>
                                <th>Created At</th>
                                <th>Edit</th>
                                <th>Delete</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->productname }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->discount }}</td>
                                    <td>{{ $product->description }}</td>
                                    @php
                                        $additionalData = json_decode($product->additional_data, true);
                                    @endphp
                                    <td>
                                        @if ($additionalData)
                                            @foreach ($additionalData as $key => $value)
                                                {{ $key }} : {{ $value }} <br>
                                            @endforeach
                                        @endif
                                    </td>


                                    <td>
                                        <img src="{{ asset('front/img/products_img') }}/{{ $product->image }}"
                                            style="max-width: 100px;">
                                    </td>
                                    <td>
                                        @if ($product->pdf_file)
                                            <a href="{{ asset('storage/app' . $product->pdf_file) }}" target="_blank">View
                                                PDF</a>
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $product->created_at->format('F j, Y') }}</td> <!-- Format the creation date -->
                                    <td><a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-info">Edit
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"> Delete</button>

                                        </form>                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h3> There are no products yet</h3>
            @endif
        </div>
    </div>

    </div>
@endsection



