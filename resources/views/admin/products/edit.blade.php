@extends('admin.layouts.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="row">
            <div class="col-md-9 col-sm-6 mx-auto">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Model <small></small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>

                        <form id="edit-form" method="POST" action="{{ route('admin.products.update', $product->id) }}"
                            data-parsley-validate class="form-horizontal form-label-left" novalidate
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT') <!-- Use PUT method for update -->
                            @include('admin.layouts.message')
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="productname">
                                    Product Name </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" id="productname" name="productname" required
                                        class="form-control" value="{{ $product->productname }}">
                                </div>
                            </div>
                            <!-- Other form fields with prepopulated values -->
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Model Name
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" id="name" name="name" required class="form-control"
                                        value="{{ $product->name }}">
                                </div>
                            </div>
                            <!-- Add other form fields here with prepopulated values -->
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Category</label>
                                <div class="col-md-6 col-sm-6">
                                    <select class="form-control" name='category_id'>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- Add other form fields here with prepopulated values -->
                            <div class="item form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="price">Price
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="number" id="price" name="price" required class="form-control"
                                        value="{{ $product->price }}">
                                </div>
                            </div>
                            <div class="item form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="price">Quantity
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="number" id="quantity" name="quantity" required class="form-control"
                                        value="{{ $product->quantity }}">
                                </div>
                            </div>
                            <!-- Add other form fields here with prepopulated values -->
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align ">Description</label>
                                <div class="col-md-6 col-sm-6">
                                    <textarea class="resizable_textarea form-control" name="description"
                                        required>{{ $product->description }}</textarea>
                                </div>
                            </div>
                            <!-- Add other form fields here with prepopulated values -->
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="pdf_file">PDF File
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="file" id="pdf_file" name="pdf_file" class="form-control">
                                </div>
                            </div>
                            <!-- Add other form fields here with prepopulated values -->
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Additional Data</label>
                                <!-- Initially, only one set of input fields -->
                                <div class="additional-data-item" id="additional-data">
                                    @php
                                    $additionalData = json_decode(
                                        $product->additional_data,
                                        true,
                                    );
                                @endphp
                                    @foreach ($additionalData as $key => $value)
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-danger remove-item" type="button">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                            <input type="text" name="keys[]" placeholder="Key"
                                                class="form-control col-md-6 col-sm-3" value="{{ $key }}">
                                            <input type="text" name="values[]" placeholder="Value"
                                                class="form-control col-md-3 col-sm-3" value="{{ $value }}">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="input-group col-md-6 col-sm-6">
                                    <button type="button" class="btn btn-primary" id="add-item">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Post Image</label>
                                <a class="btn col-form-label col-md-6 col-sm-3 label-align"
                                    title="Insert picture (or just drag &amp; drop)" id="pictureBtn">
                                    <input type="file" data-role="magic-overlay" name="image" data-target="#pictureBtn"
                                        data-edit="insertImage" value="{{ old('image') }}">
                            </div>
                            <!-- Add other form fields here with prepopulated values -->
                            <div class="btn-group form-group row">
                                <div class="col-md-6 col-sm-3 offset-md-3">
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </div>
                        </form>

                        <script type="text/javascript">
                            // Add more input fields
                            document.getElementById('add-item').addEventListener('click', function() {
                                var container = document.getElementById('additional-data');
                                var newItem = document.createElement('div');
                                newItem.classList.add('additional-data-item');
                                newItem.innerHTML = `
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <button class="btn btn-danger remove-item" type="button">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </div>
                                                    <input type="text" name="keys[]" placeholder="Key" class="form-control">
                                                    <input type="text" name="values[]" placeholder="Value" class="form-control">
                                                </div>
                                            `;
                                container.appendChild(newItem);
                            });

                            // Remove input fields
                            document.addEventListener('click', function(e) {
                                if (e.target && e.target.classList.contains('remove-item')) {
                                    e.target.parentNode.parentNode.remove();
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection
