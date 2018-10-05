@extends('layouts.app')
@section('title')
  Courses view
@endsection
@section('content')
    <div class="container">
      <div class="row">
        @include('layouts.sidebar')
        <div class="row content">
          <div class="col-lg-12 col-xs-12">
            <a href="/courses/create" class="btn btn-lg btn-primary">Create</a>
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Title</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($courses as $course)
                <tr id="{{ $course->id }}">
                  <td onclick="location='/courses/view/{{ $course->id }}'">
                    {{ $course->title }}
                  </td>
                  <td>
                    <a href="/courses/edit/{{ $course->id }}" class="btn btn-success">Edit</a>
                  </td>
                  <td>
                    <button class="btn btn-danger delete-course">Delete</button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
@endsection
