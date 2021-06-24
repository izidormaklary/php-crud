<?php

class StudentLoader
{
    private array $students =[];

    public function loadStudents()
    {
        $pdo= Connection::openConnection();
        $handle = $pdo->prepare('SELECT s.id as id, s.Name as name, s.teacherId as teacherId, t.name as teacher, s.classId as classId, c.name as className, s.email as email FROM student s LEFT JOIN teacher t on s.teacherId=t.id LEFT JOIN class c on s.teacherId= c.teacherId GROUP BY s.id ORDER BY s.name');
        $handle->execute();
        $students= $handle->fetchAll();
        foreach ($students as $s){
            $this->students[]= new Student($s['name'], $s['id'], $s['email'], $s['classId'], $s['className'], intval($s['teacherId']), $s['teacher']);
        }

    }
    public static function insertStudent($name, $classId, $email){
        $pdo = Connection::openConnection();
        $handle = $pdo->prepare('SELECT teacherId as id FROM class WHERE id = :classId');
        $handle->bindValue(':classId', $classId);
        $handle->execute();
        $t = $handle->fetch();

        $pdo= Connection::openConnection();
        $handle = $pdo->prepare('INSERT INTO student ( Name, teacherId,classID, email) VALUES ( :name, :teacherId, :classId,  :email)');
        $handle->bindValue(':name', $name);
        $handle->bindValue(':classId', $classId);
        $handle->bindValue(':teacherId', $t['id']);
        $handle->bindValue(':email',$email);
        $handle->execute();
    }

    public function getStudents(): array
    {
        return $this->students;
    }

    public static function updateStudent($email,$classId, $name, $id)
    {
        $pdo = Connection::openConnection();
        $handle = $pdo->prepare('SELECT teacherId as id FROM class WHERE id = :classId');
        $handle->bindValue(':classId', $classId);
        $handle->execute();
        $t = $handle->fetch()['id'];

        $pdo = Connection::openConnection();
        $handle = $pdo->prepare(' UPDATE student SET  name = :name, teacherId=:teacherId, classId=:classId, email = :email WHERE id = :id ');
        $handle->bindValue(':email', $email);
        $handle->bindValue(':teacherId', $t['id']);
        $handle->bindValue(':classId', $classId);
        $handle->bindValue(':name', $name);
        $handle->bindValue(':id', $id);
        $handle->execute();
    }

    public static function deleteStudent( $id)
    {
        $pdo = Connection::openConnection();
        $handle = $pdo->prepare('DELETE FROM student WHERE id = :id');
        $handle->bindValue(':id', $id);
        $handle->execute();
    }

    public function selectStudent($id)
    {
        foreach ($this->students as $student) {
            if ($id == $student->getId()) {
                return $student;
            }
        }
    }
}