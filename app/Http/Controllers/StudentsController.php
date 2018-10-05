<?php

/**
* Script by Mr. CaT
* All scripts are by me
* All comments were made by me
* All code was written by me
*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;

use App\User;

use App\Course;

use Carbon\Carbon;

class StudentsController extends Controller
{
    /**
    * Set permissions between guests and users
    *
    * @see https://laravel.com/docs/5.5/middleware
    */

    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * Display all the students.
     *
     * @param \App\Student $student
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Student $student)
    {
        $students = $student->all();
        return view('students.index')
                  ->with('students', $students);
    }

    /**
     * Show the form for creating a new student.
     *
     * @param \App\Course $course
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Course $course)
    {
        $courses = $course->all();
        return view('students.create')
                  ->with('courses', $courses);
    }

    /**
     * Store a newly created student to database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Student $student
     *
     * @return array $result
     */
    public function store(Request $request, Student $student)
    {

        // name the values

        $studentName = $request->name;
        $studentSurname = $request->surname;
        $studentPatron = $request->patron;
        $studentEmail = $request->email;
        $studentPhone = $request->phone;
        $studentAddress = $request->address;
        $studentBirthdate = $request->birthdate;

        $courses = $request->courses;

        // insert new student

        $student->name = $studentName;
        $student->surname = $studentSurname;
        $student->patron = $studentPatron;
        $student->email = $studentEmail;
        $student->phone = $studentPhone;
        $student->address = $studentAddress;
        $student->birthday = Carbon::parse($studentBirthdate)->format('Y-m-d');
        $student->save();

        // bind student to a courses
        $student->courses()->attach($courses);

        $studentCount = $student->all()->count();

        $result['status'] = 1;
        $result['msg'] = 'success';

        // get student's info.
        // the courses which he's binded to.
        // and all students' count for manipulating with DOM.
        $result['student'] = $student;
        $result['courses'] = $student->courses;
        $result['count'] = $studentCount;
        return $result;
    }

    /**
     * Display the specified student by an ID.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Initializing the objects
        $student = new Student;

        // Logic; Finding student and showing it to the user
        $showStudent = $student->findOrFail($id);

        // Get the student's courses
        $courses = $showStudent->courses;
        return view('students.single-student')
                  ->with('courses', $courses)
                  ->with('student', $showStudent);
    }

    /**
     * Show the form for editing the student.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      // Initializing the objects
      $student = new Student;
      $course = new Course;

      // get all courses
      $courses = $course->all();

      // get the student by id
      $showStudent = $student->findOrFail($id);

      // place all student's courses' IDs for checking them with in_array function
      $studentCourses = [];
      foreach ($showStudent->courses as $c) {
          $studentCourses[] = $c->id;
      }
      return view('students.edit')
                ->with('student', $showStudent)
                ->with('studentCourses', $studentCourses)
                ->with('courses', $courses);
    }

    /**
     * Update the specified student in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student $student
     *
     * @return array $result
     */

    public function update(Request $request, Student $student)
    {
        // naming variables
        $studentId = $request->id;
        $studentName = $request->name;
        $studentSurname = $request->surname;
        $studentPatron = $request->patron;
        $studentEmail = $request->email;
        $studentPhone = $request->phone;
        $studentAddress = $request->address;
        $studentBirthdate = $request->birthdate;

        $coursesForStudent = $request->courses;

        // logical stuff
        $studentToUpdate = $student->find($studentId);

        // updating the student
        $studentToUpdate->name = $studentName;
        $studentToUpdate->surname = $studentSurname;
        $studentToUpdate->patron = $studentPatron;
        $studentToUpdate->email = $studentEmail;
        $studentToUpdate->phone = $studentPhone;
        $studentToUpdate->address = $studentAddress;
        $studentToUpdate->birthday = Carbon::parse($studentBirthdate)->format('Y-m-d');

        $studentToUpdate->save();

        // add & remove student's courses
        $student->addRemoveCourse($studentId, $coursesForStudent);

        $result['status'] = 1;
        $result['msg'] = 'success';

        // student-info and his courses; we need them to manipulate with DOM
        $result['student'] = $studentToUpdate;
        $result['courses'] = $studentToUpdate->courses;
        return $result;
    }

    /**
     * Remove the specified student from database.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Student $student
     *
     * @return array $result
     */
    public function destroy(Request $request, Student $student)
    {
        // naming vars

        $studentId = $request->id;

        // logical stuff; find the student BY ID; and delete him

        $student->find($studentId)->delete();
        $count = $student->all()->count();
        $result['status'] = 1;
        $result['msg'] = 'success';

        // studentID & all students' count are needed for manipulating with DOM
        $result['studentId'] = $studentId;
        $result['count'] = $count;
        return $result;
    }
}
