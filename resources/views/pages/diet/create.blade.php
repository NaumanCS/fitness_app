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
                    <form class="form" method="POST" action="{{route('diet.submit', $update_id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter Goal Title Here:" value="{!! $obj->title ?? '' !!}" />
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea">Description</label>
                                <textarea class="form-control" name="description" id="exampleTextarea" placeholder="Description here:" rows="3">{!! $obj->description ?? '' !!}</textarea>
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
