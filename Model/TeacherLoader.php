<?php


class TeacherLoader
{
    private array $teachers = [];

    public function loadTeachers()
    {
        $pdo = Connection::openConnection();
        $handle = $pdo->prepare('SELECT t.id as id, t.Name as name, c.id as classId, t.email as email FROM teacher t LEFT JOIN class c on t.id=c.teacherId');
        $handle->execute();
        $teachers = $handle->fetchAll();
        foreach ($teachers as $t) {
            $this->teachers[] = new Teacher($t['name'], $t['id'], $t['email'], $t['classId']);
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

    public static function deleteTeacher( $id)
    {
        $pdo = Connection::openConnection();
        $handle = $pdo->prepare('DELETE FROM teacher WHERE id = :id');
        $handle->bindValue(':id', $id);
        $handle->execute();
    }

    public function selectTeacher($id)
    {
        foreach ($this->teachers as $teacher) {
            if ($id == $teacher->getId()) {
                return $teacher;
            }
        }
    }
}
