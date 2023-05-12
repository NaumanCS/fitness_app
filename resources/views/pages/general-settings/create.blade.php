@extends('layouts.mainlayout')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="card card-custom">
                    <div class="card-header">
                        <h3 class="card-title">
                            General Settings
                        </h3>
                    </div>
                    <!--begin::Form-->
                    <form class="form" method="POST" action="{{ route('general.settings.submit') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <input type="hidden" value="{!! $obj->id ?? 0 !!}" name="id">
                            <div class="form-group">
                                <label class="col-form-label col-lg-3 col-sm-12">Upload Navbar Logo</label>
                                <div class="col-lg-4 col-12 mt-3">
                                    <input name="logo" id="logo" type="file" class="dropify"
                                    data-default-file="{{ $obj->logo ?? "" }}" data-height="100" />
                                </div>
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
