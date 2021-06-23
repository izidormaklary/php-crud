<?php
declare(strict_types=1);

//include all your model files here
//require 'Model/User.php';

require 'Model/connection.php';
require 'Model/Classroom.php';
require 'Model/ClassroomLoader.php';

require 'Model/Teacher.php';
require 'Model/TeacherLoader.php';
require 'Model/Student.php';
require 'Model/StudentLoader.php';

//include all your controllers here

//require 'Controller/HomepageController.php';
//require 'Controller/InfoController.php';
require 'Controller/classroomController.php';
require 'Controller/studentController.php';
require 'Controller/teacherController.php';
require 'Controller/HomepageController.php';


//you could write a simple IF here based on some $_GET or $_POST vars, to choose your controller
// this file should never be more than 20 lines of code!

$controller = new HomepageController();

if(isset($_GET['page']) && $_GET['page'] === 'class'|| isset($_GET['class'])){
    $controller  = new classroomController();
}elseif (isset($_GET['page']) && $_GET['page'] === 'teacher' || isset($_GET['teacher'])){
    $controller  = new teacherController();
}elseif (isset($_GET['page']) && $_GET['page'] === 'student'|| isset($_GET['student'])){
    $controller  = new studentController();
}
$controller->render();
