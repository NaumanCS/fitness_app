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
                    <form class="form" method="POST" action="{{route('intensity.submit', $update_id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter Goal Title Here:" value="{!! $obj->title ?? '' !!}" />
                            </div>
                            <div class="form-group">
                                <label>Time</label>
                                <input type="text" name="time" class="form-control" placeholder="Enter the amount of time" value="{!! $obj->time ?? '' !!}" />
                            </div>
                            <div class="form-group">
                                <label>Calories Burn</label>
                                <input type="text" name="calories_burn" class="form-control" placeholder="Calories Burn" value="{!! $obj->calories_burn ?? '' !!}" />
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
