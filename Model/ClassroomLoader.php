<?php


class ClassroomLoader
{
    private array $classrooms = [];

    public function loadClassrooms()
    {
        $pdo = Connection::openConnection();
        $handle = $pdo->prepare('SELECT c.id as id, c.name as name, c.Location as location, t.Name as teacher, c.teacherId as teacherId FROM class c LEFT JOIN teacher t ON c.teacherId=t.id ');
        $handle->execute();
        $classroom = $handle->fetchAll();
        foreach ($classroom as $c) {
            $handle = $pdo->prepare('SELECT name, id FROM student WHERE classId = :id');
            $handle->bindValue(':id', $c['id']);
            $handle->execute();
            $students = $handle->fetchAll();
            $temp = [];
            foreach ($students as $s) {
                $temp[] = $s;
            }
            $this->classrooms[] = new Classroom($c['id'], $c['name'], $c['location'], $c['teacher'], $c['teacherId'], $temp);

        }

    }

    public static function insertClassroom($name, $teacherId, $location)
    {
        $pdo = Connection::openConnection();
        $handle = $pdo->prepare('INSERT INTO class ( name, Location, teacherId) VALUES ( :name,  :Location, :teacherId)');
        $handle->bindValue(':name', $name);
        $handle->bindValue(':teacherId',intval($teacherId));
        $handle->bindValue(':Location', $location);
        $handle->execute();
    }

    public function getClassrooms(): array
    {
        return $this->classrooms;
    }

    public static function updateClassroom($location, $name, $teacherId, $id)
    {
        $pdo = Connection::openConnection();
        $handle = $pdo->prepare(' UPDATE class c LEFT JOIN student s ON s.classId=c.id SET c.location = :location, c.name = :name, c.teacherId = :teacherId, s.teacherId = :teacherId WHERE c.id = :id ');
        $handle->bindValue(':location', $location);
        $handle->bindValue(':name', $name);
        $handle->bindValue(':teacherId', $teacherId);
        $handle->bindValue(':id', $id);
        $handle->execute();
    }
    public static function deleteClass($id){
        $pdo = Connection::openConnection();
        $handle = $pdo->prepare('UPDATE student SET classId=null, teacherId=null WHERE classId = :id');
        $handle->bindValue(':id', $id);
        $handle->execute();
        $handle = $pdo->prepare('DELETE FROM class WHERE id = :id');
        $handle->bindValue(':id', $id);
        $handle->execute();
    }

    public function selectClass($id)
    {
        foreach ($this->classrooms as $class) {
            if ($id == $class->getId()) {
                return $class;
            }
        }

    }

}