<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $table = 'students';
    protected $guarded = ['id'];
    protected $fillable = [
      'name', 'surname', 'patron', 'email', 'phone', 'address', 'birthday'
    ];
    public $timestamps = true;

    /**
    * For ajax requests, returns data to JSON format.
    *
    * @var array
    */

    public $result = [];

    /**
    * Creating relation between Course's Model and Student's Model.
    * We've to make 'many-to-many' relations
    *
    * @see https://laravel.com/docs/5.5/eloquent-relationships#many-to-many
    */

    public function courses()
    {
        return $this->belongsToMany('App\Course')->withTimestamps();
    }

    /**
    * Add/Remove course for specified student.
    *
    * @param int $id
    * @param array $coursesForStudent
    */

    public function addRemoveCourse($id, $coursesForStudent)
    {
        // first we find our student BY ID
        $studentToUpdate = $this->find($id);

        // if the student is binded to a course; we go on
        if (sizeof($studentToUpdate->courses) > 0) {

            // if there is some selected courses for student
            if (is_array($coursesForStudent) && sizeof($coursesForStudent) > 0) {

                // quequely we grab id of every student's course and pass it to $courses array
                $courses = [];
                foreach ($studentToUpdate->courses as $course) {
                  $courses[] = $course->id;
                }

                // delete them
                $studentToUpdate->courses()->detach($courses);

                // and add new ones
                $studentToUpdate->courses()->attach($coursesForStudent);

            // if user didn't select any courses
            } else {

                // we just delete all courses of the student
                foreach ($studentToUpdate->courses as $course) {
                  $courses[] = $course->id;
                }
                $studentToUpdate->courses()->detach($courses);
            }

        // if the student has no courses
        } else {

            // we just add new ones
            if (is_array($coursesForStudent) && sizeof($coursesForStudent) > 0) {
              $studentToUpdate->courses()->attach($coursesForStudent);
            }
        }
    }


}
