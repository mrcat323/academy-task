Routes = {
  header: {
        "Accept": "application/json",
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
  },
  editStudent: '/students/edit/push',
  createStudent: '/students/store',
  deleteStudent: '/students/delete',
  createCourse: '/courses/store',
  editCourse: '/courses/edit/push',
  deleteCourse: '/courses/delete',
}
