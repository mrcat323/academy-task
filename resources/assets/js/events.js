$(document).on('click', '.create-student', function () {
  let name = $('.name').val(),
      surname = $('.surname').val(),
      patron = $('.patron').val(),
      email = $('.email').val(),
      phone = $('.phone').val(),
      address = $('.address').val(),
      birthdate = $('.birthdate').val(),
      course = $('.selected-course');

  var ids = [];
  for (var i = 0; i < course.length; i++) {
    ids.push(parseInt(course[i].id));
  }
  Requests.createStudent(name, surname, patron, email, phone, address, birthdate, ids);
});

$(document).on('click', '.update-student', function () {
  let id = $(this).closest('.update-form').attr('id'),
      name = $('.name').val(),
      surname = $('.surname').val(),
      patron = $('.patron').val(),
      email = $('.email').val(),
      phone = $('.phone').val(),
      address = $('.address').val(),
      birthdate = $('.birthdate').val(),
      course = $('.selected-course');

  var ids = [];
  for (var i = 0; i < course.length; i++) {
    ids.push(parseInt(course[i].id));
  }
  Requests.editStudent(id, name, surname, patron, email, phone, address, birthdate, ids);
});

$(document).on('click', '.create-course', function () {
  let title = $('.title').val();

  Requests.createCourse(title);
});

$(document).on('click', '.edit-course', function () {
  let id = $(this).closest('.edit-form-course').attr('id'),
      title = $('.title').val();

  Requests.editCourse(id, title);
});

$(document).on('click', '.delete-student', function () {
  let id = $(this).closest('tr').attr('id');
  Requests.deleteStudent(id);
});

$(document).on('click', '.delete-course', function () {
  let id = $(this).closest('tr').attr('id');
  Requests.deleteCourse(id);
});

$(document).on('click', '.select-course', function () {
  $(this).toggleClass('selected-course');
});
