@extends('layouts.app')
@section('title')
  {{ $course->title }}
@endsection
@section('content')
<div class="container">
  <div class="row">
      @include('layouts.sidebar')
      <div class="row content">
        <div class="col-sm-8 col-md-8 col-xs-12 col-md-offset-2">
          <h2>Information about {{ $course->title }} <a href="/courses/edit/{{ $course->id }}" class="btn btn-success">Edit</a></h2>
          <p>{{ $course->title }}</p>
          @if (sizeof($students) > 0)
          <h3>Students list for course:</h3>
          <ul>
            @foreach ($students as $student)
            <li>{{ $student->name . ' ' . $student->surname }}</li>
            @endforeach
          </ul>
          @else
          <i>There are not students binded to this course...</i>
          @endif
        </div>
      </div>
  </div>
</div>
@endsection
