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
                    <form class="form" method="POST" action="{{ route('faq.submit', $update_id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Question</label>
                                <input type="text" name="question" class="form-control"
                                    placeholder="Question Here:" value="{!! $obj->question ?? '' !!}" />
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea">Asnwer</label>
                                <textarea class="form-control" name="answer" id="exampleTextarea" placeholder="Answer here:" rows="3">{!! $obj->answer ?? '' !!}</textarea>
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
