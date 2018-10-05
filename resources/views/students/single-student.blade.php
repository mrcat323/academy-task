@extends('layouts.app')
@section('title')
  {{ $student->surname . ' ' . $student->name }}
@endsection
@section('content')
<div class="container">
  <div class="row">
      @include('layouts.sidebar')
      <div class="row content">
        <div class="col-sm-8 col-md-8 col-xs-12 col-md-offset-2">
          <h2>Information about {{ $student->name . ' ' . $student->surname }} <a href="/students/edit/{{ $student->id }}" class="btn btn-success">Edit</a></h2>
          <p>Name: {{ $student->name }}</p>
          <p>Surname: {{ $student->surname }}</p>
          <p>Patronomic Name (Parent's name): {{ $student->patron }}</p>
          <p>Email: {{ $student->email }}</p>
          <p>Phone number: {{ $student->phone }}</p>
          <p>Address: {{ $student->address }}</p>
          <p>Birthdate: {{ $student->birthday }}</p>
        </div>
        <div class="col-sm-8 col-md-8 col-xs-12 col-md-offset-2">
          <h2>Courses</h2>
          @if (sizeof($courses) > 0)
          <ul>
            @foreach ($courses as $course)
            <li>{{ $course->title }}</li>
            @endforeach
          </ul>
          @else
          <i>The student is not binded to a course</i>
          @endif
        </div>
      </div>
  </div>
</div>
@endsection
