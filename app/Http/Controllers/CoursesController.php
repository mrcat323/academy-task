<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Course;

class CoursesController extends Controller
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
    * Get all students by course.
    * + all info about the course.
    *
    * @param int $id
    *
    * @return \Illuminate\Http\Response
    */

    public function show($id)
    {
        $course = new Course;
        $courseInfo = $course->findOrFail($id);
        $studentsByCourse = $courseInfo->students;
        return view('courses.single-course')
                  ->with('students', $studentsByCourse)
                  ->with('course', $courseInfo);
    }

    /**
    * Show edit form, for modifying the course info.
    *
    * @param int $id
    *
    * @return \Illuminate\Http\Response
    */

    public function edit($id)
    {
        $course = new Course;
        $courseInfo = $course->findOrFail($id);
        return view('courses.edit')
                  ->with('course', $courseInfo);
    }

    /**
    * List all courses.
    *
    * @param \App\Course $course
    *
    * @return \Illuminate\Http\Response
    */

    public function index(Course $course)
    {
        $courses = $course->all();
        return view('courses.index')
                ->with('courses', $courses);
    }

    /**
    * Show create form. With the form, one can create a course.
    *
    * @return \Illuminate\Http\Response
    */

    public function create()
    {
        return view('courses.create');
    }

    /**
    * Create a course.
    *
    * @param \Illuminate\Http\Request $request
    * @param \App\Course $course
    *
    * @return array $result
    */

    public function store(Request $request, Course $course) {

        // create new course

        $courseTitle = $request->title;
        $course->title = $courseTitle;
        $course->save();
        $count = $course->all()->count();
        $result['status'] = 1;
        $result['msg'] = 'success';
        // get either course-count or the info of the course for manipulating with DOM with jQuery
        $result['course'] = $course;
        $result['count'] = $count;
        return $result;
    }

    /**
    * Save modifies changes. Update the course.
    *
    * @param \Illuminate\Http\Request $request
    * @param \App\Course $course
    *
    * @return array $result
    */

    public function update(Request $request, Course $course)
    {
        // Receiving arguments
        $courseId = $request->id;
        $courseTitle = $request->title;

        // logic; find the course BY ID and save changes
        $courseToUpdate = $course->find($courseId);
        $courseToUpdate->title = $courseTitle;
        $courseToUpdate->save();

        // students for course
        $studentsForCourse = $courseToUpdate->students;
        $result['status'] = 1;
        $result['msg'] = 'success';

        // course-info for DOM manipulating
        $result['course'] = $courseToUpdate;
        $result['students'] = $studentsForCourse;
        return $result;
    }

    /**
    * Delete a course by ID.
    *
    * @param \Illuminate\Http\Request $request
    * @param \App\Course $course
    *
    * @return array $result
    */

    public function destroy(Request $request, Course $course)
    {
        // Receiving arguments
        $courseId = $request->id;

        $course->find($courseId)->delete();
        $count = $course->all()->count();

        $result['status'] = 1;
        $result['msg'] = 'success';

        // course-id and course-count for manipulating with DOM
        $result['courseId'] = $courseId;
        $result['count'] = $count;
        return $result;
    }


}
