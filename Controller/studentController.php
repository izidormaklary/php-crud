<?php


class studentController
{
    public function render()
    {
        $teacherpage = "";
        $classpage = "";
        $studentpage = "active";
        if (isset($_POST['editId'])) {
            $students = new StudentLoader();
            $students->loadStudents();
            $selectedStudent = $students->selectStudent($_POST['editId']);
            $teachers = new TeacherLoader();
            $teachers->loadTeachers();
            require 'View/student/studentEditView.php';

        } elseif (isset($_POST['insert'])) {
            $teachers = new TeacherLoader();
            $teachers->loadTeachers();
            require 'View/student/studentInsertView.php';
        } else {
            if (isset($_POST['submitStudentEdit'])) {
                var_dump($_POST['id']);
                StudentLoader::updateStudent($_POST['email'], $_POST['teacherId'], $_POST['name'], intval($_POST['id']));
            } elseif (isset($_POST['deleteId'])) {
                StudentLoader::deleteStudent($_POST['deleteId']);
            } elseif (isset($_POST['insertNewStudent'])) {
                StudentLoader::insertStudent($_POST['name'], $_POST['teacherId'], $_POST['email']);
            }
            $students = new StudentLoader();
            $students->loadStudents();
            $studentObj = $students->getStudents();
            $classrooms = new ClassroomLoader();
            $classrooms->loadClassrooms();

            require 'View/student/studentTableView.php';
        }

    }
}