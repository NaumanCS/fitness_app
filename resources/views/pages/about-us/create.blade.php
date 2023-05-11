@extends('layouts.mainlayout')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    <div class="card-header">
                        <h3 class="card-title">
                            Add new Goal for the User
                        </h3>
                    </div>
                    <!--begin::Form-->
                    <form class="form" method="POST" action="{{ route('intensity.submit', $update_id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Heading</label>
                                <input type="text" name="heading" class="form-control" placeholder="Enter Heading here:"
                                    value="{!! $obj->heading ?? '' !!}" />
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-12 col-sm-12">Default Demo</label>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="summernote" id="kt_summernote_1"></div>
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
