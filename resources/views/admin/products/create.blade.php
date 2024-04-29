@extends('admin.layouts.app')
@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="row  ">
            <div class="col-md-9 col-sm-6 mx-auto">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add New Product <small></small></h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content ">
                        <br>

                        <form id="demo-form2" method="POST" action="{{ route('admin.products.store') }}"
                            data-parsley-validate="" class="form-horizontal form-label-left " novalidate="" enctype="multipart/form-data">
                            @csrf
                            @include('admin.layouts.message')
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="productname"> products Name
                                    </span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="productname" name="productname" required="required"
                                        class="form-control " value="{{ old('productname') }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="name"> Modle Name
                                    </span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="name" name="name" required="required"
                                        class="form-control " value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align ">Category</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name='category_id' value="{{ old('category_id') }}">
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{ $category->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="item form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="price" > price
                                    </span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="number" id="price" name="price" required="required"
                                        class="form-control " value="{{ old('price') }}">
                                </div>
                            </div>
                            <div class="item form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="price" > Quantity
                                    </span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="number" id="quantity" name="quantity" required="required"
                                        class="form-control " value="{{ old('quantity') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align ">Descieption</label>
                                <div class="col-md-6  col-sm-9 ">
                                    <textarea class="resizable_textarea form-control" name="description" value="{{ old('description') }}"></textarea>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="pdf_file">PDF File</label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="file" id="pdf_file" name="pdf_file" class="form-control" value="{{ old('pdf_file') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align ">Addition data</label>
                                    <!-- Initially, only one set of input fields -->
                                    <div class="additional-data-item" id="additional-data">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-danger remove-item" type="button" >
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>

                                            <input type="text" name="keys[]" placeholder="Key"
                                                class="form-control col-md-6  col-sm-3" value="{{ old('keys[]') }}">
                                            <input type="text" name="values[]" placeholder="Value"
                                                class="form-control col-md-3  col-sm-3" value="{{ old('values[]') }}">
                                            <div class=" col-md-6 col-sm-6">
                                                <button type="button" class="btn btn-primary" id="add-item">
                                                    <i class="bi bi-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            <div class="btn-group form-group row">
                                <a class="btn col-form-label col-md-6 col-sm-3 label-align"
                                    title="Insert picture (or just drag &amp; drop)" id="pictureBtn">
                                    <input type="file" data-role="magic-overlay" name="image" data-target="#pictureBtn"
                                        data-edit="insertImage" value="{{ old('image') }}">
                            </div>

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
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection
