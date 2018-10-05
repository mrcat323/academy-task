@extends('layouts.app')
@section('title')
    Add course
@endsection
@section('content')

<section class="section-padding-50 blog-page">
    <div class="container">
        <div class="row">
            @include('layouts.sidebar')
            <div class="row content">
              <div class="col-lg-8">
                <div class="border border-top-0">
                  <h4 class="form-hint">Add a course</h4>
                  <div class="form-cover">
                    <div class="form-group">
                      {{ csrf_field() }}
                      <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="title form-control" placeholder="Please enter the title of the course" autofocus>
                      </div>
                      <button class="btn btn-lg btn-primary create-course">Submit</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</section>
@endsection
