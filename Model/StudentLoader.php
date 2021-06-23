<?php

class StudentLoader
{
    private array $students =[];

    public function loadStudents()
    {
        $pdo= Connection::openConnection();
        $handle = $pdo->prepare('SELECT s.id as id, s.Name as name, s.teacherId as teacherId, t.name as teacher, c.id as classId, c.name as className, s.email as email FROM student s LEFT JOIN teacher t on s.teacherId=t.id LEFT JOIN class c on s.teacherId= c.teacherId');
        $handle->execute();
        $students= $handle->fetchAll();
        foreach ($students as $s){
            $this->students[]= new Student($s['name'], $s['id'], $s['email'], $s['classId'], $s['className'], $s['teacherId'], $s['teacher']);
        }

    }
    public static function insertStudent($name, $teacherId, $email){
        $pdo= Connection::openConnection();
        $handle = $pdo->prepare('INSERT INTO student ( Name, teacherId, email) VALUES ( :name, :teacherId,  :email)');
        $handle->bindValue(':name', $name);
        $handle->bindValue(':teacherId', $teacherId);
        $handle->bindValue(':email',$email);
        $handle->execute();
    }

    public function getStudents(): array
    {
        return $this->students;
    }

    public static function updateStudent($email,$teacherId, $name, $id)
    {
        $pdo = Connection::openConnection();
        $handle = $pdo->prepare(' UPDATE student SET  name = :name, teacherId=:teacherId email = :email WHERE id = :id ');
        $handle->bindValue(':email', $email);
        $handle->bindValue(':teacherId', $teacherId);
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
////StudentLoader::insertStudent("becody", "becode@becode.werp" );
//$student = new StudentLoader();
//$student->loadStudents();