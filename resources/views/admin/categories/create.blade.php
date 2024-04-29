
@extends('admin.layouts.app')
@section('content')

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row  ">
            <div class="col-md-6 col-sm-6 mx-auto">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add New Category <small></small></h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content ">
                        <br>

                        <form id="demo-form2" method="post" action="{{route('admin.categories.store')}}" data-parsley-validate="" class="form-horizontal form-label-left " novalidate="">
                            @csrf
                            @include('admin.layouts.message')

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> Category Name </span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="first-name" name="name" required="required" class="form-control ">
                                </div>
                            </div>



                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>        </div>
        <!-- /page content -->

@endsection



