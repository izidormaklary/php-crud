<?php


class studentController
{
    public function render()
    {
        $error = "";
        $teacherpage = "";
        $classpage = "";
        $studentpage = "active";
        $students = new StudentLoader();

        $classrooms = new ClassroomLoader();
        $classrooms->loadClassrooms();

        //press edit button
        if (isset($_POST['editId'])) {
            $students->loadStudents();
            $selectedStudent = $students->selectStudent($_POST['editId']);
            require 'View/student/studentEditView.php';
            //press create button
        } elseif (isset($_POST['insert'])) {
            $students->loadStudents();
            require 'View/student/studentInsertView.php';
            //press create button
        } elseif (isset($_GET['student'])) {
            $students->loadStudents();
            $selectedStudent = $students->selectStudent($_GET['student']);
            require 'View/student/studentFocusView.php';
            //searching
        } elseif (isset($_POST['search'])) {
            $students->loadStudents();
            $selectedStudent = $students->selectStudentByName(ucfirst($_POST['searchInput']));
            if (empty($selectedStudent)) {
                $error= "border-warning";
                $studentObj = $students->getStudents();
                require 'View/student/studentTableView.php';
            } else {
                require 'View/student/studentFocusView.php';
            }
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