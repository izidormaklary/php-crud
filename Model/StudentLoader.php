<?php

class StudentLoader
{
    private array $students =[];

    public function loadStudents()
    {
        $pdo= Connection::openConnection();
        $handle = $pdo->prepare('SELECT s.id as id, s.Name as name, t.id as teacherId, s.email as email FROM student s LEFT JOIN teacher t on s.teacherId=t.id');
        $handle->execute();
        $students= $handle->fetchAll();
        foreach ($students as $s){
            $this->students[]= new Student($s['name'], $s['id'], $s['email'], $s['teacherId']);
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