<?php
require 'connection.php';
require 'Student.php';

class StudentLoader
{
    private array $students =[];

    public function loadStudents()
    {
        $pdo= Connection::openConnection();
        $handle = $pdo->prepare('SELECT s.id as id, s.Name as name, c.id as classId, t.id as teacherId, s.email as email FROM student s LEFT JOIN teacher t on s.teacherId=t.id LEFT JOIN class c on s.teacherId=c.teacherId');
        $handle->execute();
        $students= $handle->fetchAll();
        foreach ($students as $s){
            $this->students[]= new Student($s['name'], $s['id'], $s['email'], $s['classId'], $s['teacherId']);
        }
        var_dump($this->students);
    }
    public static function insertStudent($name, $email){
        $pdo= Connection::openConnection();
        $handle = $pdo->prepare('INSERT INTO student ( Name, email) VALUES ( :name,  :email)');
        $handle->bindValue(':name', $name);
        //$handle->bindValue(':class', $class);
        //$handle->bindValue(':teacherId', $teacherId);
        $handle->bindValue(':email',$email);
        $handle->execute();
    }
}
//StudentLoader::insertStudent("becody", "becode@becode.werp" );
$student = new StudentLoader();
$student->loadStudents();