<?php


class teacherController
{
    public function render()
    {
        $error = "";
        $teacherpage = "active";
        $classpage = "";
        $studentpage = "";
        $teachers = new TeacherLoader();

        if (isset($_POST['editId'])) {
            $teachers->loadTeachers();
            $selectedTeacher = $teachers->selectTeacher($_POST['editId']);
            require 'View/teacher/teacherEditView.php';
        } elseif (isset($_POST['insert'])) {
            require 'View/teacher/teacherInsertView.php';
        } elseif (isset($_GET['teacher'])) {
            $teachers->loadTeachers();
            $selectedTeacher = $teachers->selectTeacher($_GET['teacher']);
            require 'View/teacher/teacherFocusView.php';
        }elseif (isset($_POST['search'])) {
            $teachers->loadTeachers();
            $selectedTeacher = $teachers->selectTeacherByName(ucfirst($_POST['searchInput']));
            if (empty($selectedTeacher)) {
                $error= "border-warning";
                $teacherObj = $teachers->getTeachers();
                require 'View/teacher/teacherTableView.php';
            } else {
                require 'View/teacher/teacherFocusView.php';
            }
        } else {
            if (isset($_POST['submitTeacherEdit'])) {
                TeacherLoader::updateTeacher($_POST['email'], $_POST['name'], intval($_POST['id']));
            } elseif (isset($_POST['deleteId'])) {
                TeacherLoader::deleteTeacher($_POST['deleteId']);
            } elseif (isset($_POST['insertNewTeacher'])) {
                TeacherLoader::insertTeacher($_POST['name'], $_POST['email']);
            }
            $teachers->loadTeachers();
            $teacherObj = $teachers->getTeachers();
            require 'View/teacher/teacherTableView.php';
        }

    }
}