@extends('admin.layouts.app')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="row">
            <div class="col-md-9 col-sm-6 mx-auto">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add New Post <small></small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br>

                        <form id="demo-form2" method="POST" action="{{ route('admin.blogs.store') }}" data-parsley-validate=""
                              class="form-horizontal form-label-left" novalidate="" enctype="multipart/form-data">
                            @csrf
                            @include('admin.layouts.message')

                            <!-- Title and Subtitle Inputs -->
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Title</label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" id="title" name="title" required="required"
                                           class="form-control" value="{{ old('title') }}">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="subtitle">SubTitle</label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" id="subtitle" name="subtitle" required="required"
                                           class="form-control" value="{{ old('subtitle') }}">
                                </div>
                            </div>

                            <!-- Section Inputs -->
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Post Content</label>
                                <div class="col-md-6 col-sm-6">
                                    <hr> <!-- Section line -->
                                    <div class="section-content">
                                        <div class="additional-data-item" id="additional-data">
                                            <div class="input-group">
                                                <button class="btn btn-danger remove-item" type="button">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                                <input type="text" name="keys[]" placeholder="Section Title"
                                                       class="form-control">
                                            </div>
                                            <textarea name="values[]" placeholder="Section Content"
                                                      class="form-control mt-3"></textarea>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary mt-3" id="add-item">
                                        Add Section
                                    </button>
                                </div>
                            </div>

                            <!-- Picture Input -->
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" title="Insert picture (or just drag &amp; drop)" id="pictureBtn">Picture</label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="file" data-role="magic-overlay" name="image" data-target="#pictureBtn"
                                           data-edit="insertImage" value="{{ old('image') }}">
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="item form-group">
                                <div class="col-md-12 col-sm-12 text-center">
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

    <style>
        /* Add some spacing between section items */
        .section-content .additional-data-item + .additional-data-item {
            margin-top: 20px;
        }
        .section-content .additional-data-item:not(:first-child) {
        margin-top: 20px;
    }
    </style>

    <script type="text/javascript">
        // Add more input fields
        document.getElementById('add-item').addEventListener('click', function() {
            var container = document.getElementById('additional-data');
            var newItem = document.createElement('div');
            newItem.classList.add('additional-data-item');
            newItem.innerHTML = `
                <div class="input-group">
                    <button class="btn btn-danger remove-item" type="button">
                        <i class="bi bi-trash"></i>
                    </button>
                    <input type="text" name="keys[]" placeholder="Section Title"
                           class="form-control">
                </div>
                <textarea name="values[]" placeholder="Section Content"
                          class="form-control mt-3"></textarea>
            `;
            container.appendChild(newItem);

            // Add event listener for new remove buttons
            newItem.querySelector('.remove-item').addEventListener('click', function() {
                newItem.remove();
            });
        });
    </script>
@endsection
