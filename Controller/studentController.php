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


//$pdo = Connection::openConnection();
//$handle = $pdo->prepare('SELECT t.id FROM class c WHERE c.id = :id');
//$handle->bindValue(':id', $classId);
//$handle->execute();
//$students = $handle->fetchAll();
//
//$handle = $pdo->prepare('INSERT INTO class ( name, Location, teacherId) VALUES ( :name,  :Location, :teacherId)');
//$handle->bindValue(':name', $name);
////$handle->bindValue(':class', $class);
//$handle->bindValue(':teacherId', $teacherId);
//$handle->bindValue(':Location', $location);
//$handle->execute();