@extends('layouts.app')
@section('title')
    {{ 'Editing ' . $student->name . ' ' . $student->surname }}
@endsection
@section('content')

<section class="section-padding-50 blog-page">
    <div class="container">
        <div class="row">
          @include('layouts.sidebar')
          <div class="row content">
            <div class="col-lg-8">
              <div class="border border-top-0">
                <h4>Edit a student</h4>
                <div class="breadcrumb justify-content-between sheare-breadcrumb mb-30">
                  <div class="form-group update-form" id="{{ $student->id }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" type="text" name="name" class="name form-control" placeholder="Name" value="{{ $student->name }}" autofocus>
                    </div>
                    <div class="form-group">
                      <label for="surname">Surname</label>
                      <input type="text" name="surname" class="surname form-control" value="{{ $student->surname }}" placeholder="Surname">
                    </div>
                    <div class="form-group">
                      <label for="patron">Patronomic Name (Parent's name)</label>
                      <input type="text" name="patron" class="patron form-control" value="{{ $student->patron }}" placeholder="Patronomic Name (Parent's name)">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" name="email" class="email form-control" value="{{ $student->email }}" placeholder="Email">
                    </div>
                    <div class="form-group">
                      <label for="phone">Phone Number</label>
                      <input type="text" name="phone" class="phone form-control" value="{{ $student->phone }}" placeholder="Phone Number">
                    </div>
                    <div class="form-group">
                      <label for="address">Address</label>
                      <input type="text" name="address" class="address form-control" value="{{ $student->address }}" placeholder="Address">
                    </div>
                    <div class="form-group">
                      <label for="birthdate">Birthdate (YYYY-MM-DD)</label>
                      <input type="text" name="birthdate" class="birthdate form-control" value="{{ $student->birthday }}" placeholder="Birthdate">
                    </div>
                    <b>Bind the student to a course:</b>
                    <div class="course-list courses padding-35-30">
                      @foreach ($student->courses as $studentCourse)
                      <button class="btn btn-default select-course selected-course" id="{{ $studentCourse->id }}">{{ $studentCourse->title }}</button>
                      @endforeach
                      @foreach ($courses as $course)
                      @if (!in_array($course->id, $studentCourses))
                      <button class="btn btn-default select-course" id="{{ $course->id }}">{{ $course->title }}</button>
                      @endif
                      @endforeach
                    </div>

                    <button class="btn btn-lg btn-primary update-student">Submit</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</section>
@endsection
