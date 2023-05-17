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
                    <form class="form" method="POST" action="{{route('goals.submit', $update_id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter Goal Title Here:" value="{!! $obj->title ?? '' !!}" />
                            </div>
                            <div class="form-group">
                                <label>Browse Image</label>
                                <div></div>
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="customFile" value="{{ $obj->image ?? "" }}" />
                                    <label class="custom-file-label" for="customFile">Choose file</label>
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
