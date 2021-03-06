<?php


class classroomController
{
    public function render()
    {
        $error = "";
        $teacherpage = "";
        $classpage = "active";
        $studentpage = "";
        $classes = new ClassroomLoader();
        if (isset($_POST['editId'])) {

            $classes->loadClassrooms();
            $selectedClass = $classes->selectClass($_POST['editId']);
            $teachers = new TeacherLoader();
            $teachers->loadTeachers();
            require 'View/classroom/classEditView.php';

        } elseif (isset($_POST['insert'])) {
            $teachers = new TeacherLoader();
            $teachers->loadTeachers();
            require 'View/classroom/classInsertView.php';
        } elseif (isset($_GET['class'])) {
            $classes->loadClassrooms();
            $selectedClass = $classes->selectClass($_GET['class']);
            require 'View/classroom/classFocusView.php';
        }elseif (isset($_POST['search'])) {
            $classes->loadClassrooms();
            $selectedClass = $classes->selectClassByName(ucfirst($_POST['searchInput']));
            if (empty($selectedClass)) {
                $error= "border-warning";
                $classObj = $classes->getClassrooms();
                require 'View/classroom/classTableView.php';
            } else {
                require 'View/classroom/classFocusView.php';
            }
        }else {
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