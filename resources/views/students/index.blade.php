@extends('layouts.app')
@section('title')
  Students View
@endsection
@section('content')
    <div class="container">
      <div class="row">
        @include('layouts.sidebar')
        <div class="row content">
          <div class="col-lg-12 col-xs-12">
            <a href="/students/create" class="btn btn-lg btn-primary">Create</a>
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Surname</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($students as $student)
                <tr id="{{ $student->id }}">
                  <td onclick="location='/students/show/{{ $student->id }}'">
                    {{ $student->name }}
                  </td>
                  <td onclick="location='/students/show/{{ $student->id }}'">
                    {{ $student->surname }}
                  </td>
                  <td>
                    <a href="/students/edit/{{ $student->id }}" class="btn btn-success">Edit</a>
                  </td>
                  <td>
                    <button class="btn btn-danger delete-student">Delete</button>
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
