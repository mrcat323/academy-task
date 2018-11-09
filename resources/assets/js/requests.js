Requests = {

  editStudent(id, name, surname, patron, email, phone, address, birthdate, courses) {
    $.ajax({
      url: Routes.editStudent,
      type: 'POST',
      headers: Routes.header,
      data: {
        id, name, surname, patron, email, phone, address, birthdate, courses
      }
    }).done(function (data) {

      // first we get rid of everything within ".content" block
      // then, add alert that "You successfully edited the student!", also show all info about him
      // + we show the courses he's binded to.
      $('.content').prepend('<div class="alert alert-success">The student have been successfully modified!</div>')
      // redirect straight to student info page
      setTimeout(function () {
        window.location.replace(`/students/show/${data.student.id}`);
      }, 1500);
    });
  },

  createStudent(name, surname, patron, email, phone, address, birthdate, courses) {
    $.ajax({
      url: Routes.createStudent,
      type: 'POST',
      headers: Routes.header,
      data: {
        name, surname, patron, email, phone, address, birthdate, courses
      }
    }).done(function (data) {

        // first we get rid of everything within ".content" block
        // then, add alert that "You successfully added a student!", also show all info about him
        // + we show the courses he's binded to.
        $('.content').empty();
        $('.content').prepend('<div class="alert alert-success">The student have been successfully added!</div>')
        $('.content').append('<div class="col-sm-8 col-md-8 col-xs-12 col-md-offset-2"><h2>Information about ' + data.student.name + ' ' + data.student.surname + '</h2><p>Name: ' + data.student.name + '</p><p>Surname: ' + data.student.surname + '</p><p>Patronomic Name (Parent\'s name): ' + data.student.patron + '</p><p>Email: ' + data.student.email + '</p><p>Phone number: ' + data.student.phone + '</p><p>Address: ' + data.student.address + '</p><p>Birthdate: ' + data.student.birthday + '</p></div>');
        if (data.courses.length > 0) {
          $('.content').append('<div class="col-sm-8 col-md-8 col-xs-12 col-md-offset-2"><h2>Courses</h2><ul class="course-list">');
          $.each(data.courses, function (i, v) {
              $('.course-list').append('<li>' + v.title + '</li>');
          });
          $('.content').append('</ul>');
        } else {
          $('.content').append('<i>The student is not binded to a course</i>');
        }
        $('.content').append('</div>');
        // change the counter of students
        $('.student-count').text(data.count);
    });
  },

  deleteStudent(id) {
    $.ajax({
      url: Routes.deleteStudent,
      type: 'POST',
      headers: Routes.header,
      data: {
        id
      }
    }).done(function (data) {

      // remove the row from the table
      $('tr#' + data.studentId).remove();
      // change the counter of students
      $('.student-count').text(data.count);
    });
  },


  createCourse(title) {
    $.ajax({
      url: Routes.createCourse,
      type: 'POST',
      headers: Routes.header,
      data: {
        title
      }
    }).done(function (data) {

      // remove ".form-hint" & ".form-cover" blocks & insert information about the course
      // set alert "You successfully created a course"
      $('.form-hint, .form-cover').remove();
      $('.border').append('<div class="course col-sm-8 col-md-8 col-xs-12 col-md-offset-2"><h2>Information about ' + data.course.title + ' </h2><p>' + data.course.title + '</p><i>There are not students binded to this course...</i></div>')
      $('.border').prepend('<div class="alert alert-success">The course have been successfully created!</div>');
      // change the counter of courses
      $('.course-count').text(data.count);
    });
  },
  editCourse(id, title) {
    $.ajax({
      url: Routes.editCourse,
      type: 'POST',
      headers: Routes.header,
      data: {
        id, title
      }
    }).done(function (data) {

      // remove ".form-hint" & ".form-cover" blocks & insert information about the course
      // set alert "You successfully edited a course"
      $('.border').prepend('<div class="alert alert-success">The course have been successfully modified!</div>');
      // redirect straight to edited course
      setTimeout(function () {
        window.location.replace(`/courses/view/${data.course.id}`);
      }, 1500);
    });
  },
  deleteCourse(id) {
    $.ajax({
      url: Routes.deleteCourse,
      type: 'POST',
      headers: Routes.header,
      data: {
        id
      }
    }).done(function (data) {

      // delete course-row from the table
      $('tr#' + data.courseId).remove();
      // change the counter of courses
      $('.course-count').text(data.count);
    });
  },
}
