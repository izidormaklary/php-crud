<?php


class classroomController
{
    public function render()
    {
        // ;
        $teacherpage = "";
        $classpage = "active";
        $studentpage = "";
        if (isset($_POST['editId'])) {
            $classes = new ClassroomLoader();
            $classes->loadClassrooms();
            $selectedClass = $classes->selectClass($_POST['editId']);
            $teachers = new TeacherLoader();
            $teachers->loadTeachers();
            require 'View/classroom/classEditView.php';

        } elseif (isset($_POST['insert'])) {
            $teachers = new TeacherLoader();
            $teachers->loadTeachers();
            require 'View/classroom/classInsertView.php';
        } else {
            if (isset($_POST['submitClassEdit'])) {
                ClassroomLoader::updateClassroom($_POST['location'], $_POST['name'], $_POST['teacherId'], $_POST['id']);
            } elseif (isset($_POST['deleteId'])) {
                ClassroomLoader::deleteClass($_POST['deleteId']);
            } elseif (isset($_POST['insertNewClass'])) {
                ClassroomLoader::insertClassroom($_POST['name'], $_POST['teacherId'], $_POST['location']);
            }
            $classes = new ClassroomLoader();
            $classes->loadClassrooms();
            $classObj = $classes->getClassrooms();

            require 'View/classroom/classTableView.php';
        }

    }


}