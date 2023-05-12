@extends('layouts.mainlayout')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    <div class="card-header">
                        <h3 class="card-title">
                            Add new About Us Page Content
                        </h3>
                    </div>
                    <!--begin::Form-->
                    <form class="form" method="POST" action="{{ route('about.submit', $update_id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Heading</label>
                                <input type="text" name="heading" class="form-control" placeholder="Enter Heading here:"
                                    value="{!! $obj->heading ?? '' !!}" />
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-12 col-sm-12">Content</label>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <textarea class="summernote" id="kt_summernote_1" name="content"></textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            </div>
                    </form>
                    <!--end::Form-->
                </div>
            </div>
        </div>
    </div>
@endsection
