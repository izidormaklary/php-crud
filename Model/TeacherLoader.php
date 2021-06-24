<?php


class TeacherLoader
{
    private array $teachers = [];

    public function loadTeachers()
    {
        $pdo = Connection::openConnection();
        $handle = $pdo->prepare('SELECT t.id as id, t.Name as name, c.id as classId, c.name as className, t.email as email FROM teacher t LEFT JOIN class c on t.id=c.teacherId');
        $handle->execute();
        $teachers = $handle->fetchAll();
        foreach ($teachers as $t) {
            $handle = $pdo->prepare('SELECT name, id FROM student WHERE teacherId = :id');
            $handle->bindValue(':id', $t['id']);
            $handle->execute();
            $students = $handle->fetchAll();
            $temp = [];
            foreach ($students as $s) {
                $student = array("name" => $s['name'], "id" => $s['id']);
                $temp[] = $student;
            }
            var_dump($t['classId']);
            $teacherobj = new Teacher($t['name'], $t['id'], $t['email'], $t['classId'], $t['className']);
            $teacherobj->setStudents($temp);
            $this->teachers[] = $teacherobj;
        }

    }

    public static function insertTeacher($name, $email)
    {
        $pdo = Connection::openConnection();
        $handle = $pdo->prepare('INSERT INTO teacher ( Name, email) VALUES ( :name,  :email)');
        $handle->bindValue(':name', $name);
        //$handle->bindValue(':class', $class);
        //$handle->bindValue(':teacherId', $teacherId);
        $handle->bindValue(':email', $email);
        $handle->execute();
    }

    public function getTeachers(): array
    {
        return $this->teachers;
    }

    public static function updateTeacher($email, $name, $id)
    {
        $pdo = Connection::openConnection();
        $handle = $pdo->prepare(' UPDATE teacher SET  name = :name, email = :email WHERE id = :id ');
        $handle->bindValue(':email', $email);
        $handle->bindValue(':name', $name);
        $handle->bindValue(':id', $id);
        $handle->execute();
    }

    public static function deleteTeacher($id)
    {
        $pdo = Connection::openConnection();
        $handle = $pdo->prepare('SELECT * FROM class c LEFT JOIN student s USING (teacherId) WHERE c.teacherId = :teacherId');
        $handle->bindValue(':teacherId', $id);
        $handle->execute();
        $foundInClasses = $handle->fetchAll();
        if (empty($foundInClasses)) {
            $pdo = Connection::openConnection();
            $handle = $pdo->prepare('DELETE FROM teacher WHERE id = :id');
            $handle->bindValue(':id', $id);
            $handle->execute();
        }
    }

    public function selectTeacher($id)
    {
        foreach ($this->teachers as $teacher) {
            if ($id == $teacher->getId()) {
                return $teacher;
            }
        }
    }

    public function studentsForTeacher()
    {

    }
}
