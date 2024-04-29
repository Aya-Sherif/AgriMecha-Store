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

                        <form id="edit-form" method="POST" action="{{ route('admin.blogs.update', $post->id) }}"
                            data-parsley-validate class="form-horizontal form-label-left" novalidate
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT') <!-- Use PUT method for update -->
                            @include('admin.layouts.message')

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="title">Post Title</label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" id="title" name="title" required class="form-control" value="{{ $post->title }}">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="subtitle">Subtitle</label>
                                <div class="col-md-6 col-sm-6">
                                    <input type="text" id="subtitle" name="subtitle" required class="form-control" value="{{ $post->subtitle }}">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Post Content</label>
                                <div class="col-md-6 col-sm-9">
                                    <hr> <!-- Section line -->
                                    @php
                                        $content = json_decode($post->content, true);
                                    @endphp
                                    <div id="additional-data">
                                        @foreach ($content as $key => $value)
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-danger remove-item" type="button">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>
                                                <input type="text" name="keys[]" placeholder="Key" class="form-control" value="{{ $key }}">
                                            </div>
                                            <div class="input-group mb-3">
                                                <textarea name="values[]" placeholder="Value" class="form-control">{{ $value }}</textarea>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="input-group col-md-6 col-sm-6 mt-3">
                                        <button type="button" class="btn btn-primary" id="add-item">
                                            <i class="bi bi-plus"></i> Add Content
                                        </button>
                                    </div>
                                </div>
                            </div>


                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="image">Post Image</label>
                                <a class="btn col-form-label col-md-3 col-sm-3 label-align"
                                    title="Insert picture (or just drag &amp; drop)" id="pictureBtn">
                                    <input type="file" data-role="magic-overlay" name="image" data-target="#pictureBtn"
                                        data-edit="insertImage" value="{{ old('image') }}">
                            </div>
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
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-danger remove-item" type="button">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                        <input type="text" name="keys[]" placeholder="Section title" class="form-control">
                                    </div>
                                    <div class="input-group mb-3">
                                        <textarea name="values[]" placeholder="Section content" class="form-control"></textarea>
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
