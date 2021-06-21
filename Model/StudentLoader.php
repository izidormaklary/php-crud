<?php


class StudentLoader
{
    private array $students =[];
    public function __construct()
    {
        $pdo= Connection::openConnection();
        $handle = $pdo->prepare('SELECT s.id as id, s.Name as name, c.id as classId, t.id as teacherId, s.email as email FROM student s LEFT JOIN teacher t on s.teacherId=t.id LEFT JOIN class c on s.teacherId=c.teacherId');
        $handle->execute();
        $students= $handle->fetchAll();
        foreach ($students as $s){
            $this->students[]= new Student($s['name'], $s['id'], $s['email'], $s['classId'], $s['teacherId']);
        }
    }
    public function insertStudent
}