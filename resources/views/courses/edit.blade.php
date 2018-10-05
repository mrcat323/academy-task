@extends('layouts.app')
@section('title')
    {{ 'Editing ' . $course->title  }}
@endsection
@section('content')

<section class="section-padding-50 blog-page">
    <div class="container">
        <div class="row">
            @include('layouts.sidebar')
            <div class="row content">
              <div class="col-lg-8">
                <div class="border border-top-0">
                  <h4 class="form-hint">Editing {{ $course->title  }}</h4>
                  <div class="form-cover">
                    <div class="form-group edit-form-course" id="{{ $course->id }}">
                      {{ csrf_field() }}
                      <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="title form-control" placeholder="Please enter the title of the course" value="{{ $course->title }}" autofocus>
                      </div>
                      <button class="btn btn-lg btn-primary edit-course">Submit</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</section>
@endsection
