@php
$student = new App\Student;
$course = new App\Course;
$studentsCount = $student->all()->count();
$coursesCount = $course->all()->count();
@endphp
<ul class="nav nav-pills nav-justified">
  <li class="presentation"><a href="/">Home</a></li>
  <li class="presentation"><a href="/students/list">Students <span class="badge student-count">{{ $studentsCount }}</span></a></li>
  <li class="presentation"><a href="/courses/list">Courses <span class="badge course-count">{{ $coursesCount }}</span></a></li>
</ul>
