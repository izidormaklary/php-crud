<?php


class studentController
{
    public function render()
    {
        $teacherpage = "";
        $classpage = "";
        $studentpage = "active";
        $students = new StudentLoader();

        $classrooms = new ClassroomLoader();
        $classrooms->loadClassrooms();;
        if (isset($_POST['editId'])) {
            $students->loadStudents();
            $selectedStudent = $students->selectStudent($_POST['editId']);
            require 'View/student/studentEditView.php';

        } elseif (isset($_POST['insert'])) {
            $students->loadStudents();
            require 'View/student/studentInsertView.php';
        } else {
            if (isset($_POST['submitStudentEdit'])) {
                StudentLoader::updateStudent($_POST['email'], $_POST['classId'], $_POST['name'], intval($_POST['id']));
            } elseif (isset($_POST['deleteId'])) {
                StudentLoader::deleteStudent($_POST['deleteId']);
            } elseif (isset($_POST['insertNewStudent'])) {
                StudentLoader::insertStudent($_POST['name'], $_POST['classId'], $_POST['email']);
            }
            $students->loadStudents();
            $studentObj = $students->getStudents();
            require 'View/student/studentTableView.php';
        }
    }
}