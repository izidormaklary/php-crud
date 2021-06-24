<?php


class teacherController
{
    public function render()
    {
        // ;
        $teacherpage = "active";
        $classpage = "";
        $studentpage = "";
        $teachers = new TeacherLoader();
        $teachers->loadTeachers();
        if (isset($_POST['editId'])) {
            $selectedTeacher = $teachers->selectTeacher($_POST['editId']);
            require 'View/teacher/teacherEditView.php';
        } elseif (isset($_POST['insert'])) {
            require 'View/teacher/teacherInsertView.php';
        } else {
            if (isset($_POST['submitTeacherEdit'])) {
                var_dump($_POST['id']);
                echo "problem";
                TeacherLoader::updateTeacher($_POST['email'], $_POST['name'], intval($_POST['id']));
            } elseif (isset($_POST['deleteId'])) {
                TeacherLoader::deleteTeacher($_POST['deleteId']);
            } elseif (isset($_POST['insertNewTeacher'])) {
                TeacherLoader::insertTeacher($_POST['name'], $_POST['teacherId'], $_POST['email']);
            }
            $teacherObj = $teachers->getTeachers();
            require 'View/teacher/teacherTableView.php';
        }

    }
}