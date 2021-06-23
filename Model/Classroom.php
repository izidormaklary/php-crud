<?php


class Classroom
{
    private int $id;
    private string $name;
    private string $location;
    private $teacher;
    private $teacherId;
    private array $students = [];

    public function getId(): int
    {
        return $this->id;
    }

    public function __construct(int $id, string $name, string $location, $teacher, $teacherId, array $students)
    {
        $this->id = $id;
        $this->name = $name;
        $this->location = $location;
        $this->teacher = $teacher;
        $this->teacherId = $teacherId;
        $this->students =$students;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    public function getTeacher()
    {
        return $this->teacher;
    }


    public function setTeacherId(int $teacherId): void
    {
        $this->teacherId = $teacherId;
    }

    /**
     * @return mixed
     */
    public function getTeacherId()
    {
        return $this->teacherId;
    }

    public function getStudents(): array
    {
        return $this->students;
    }
//    public function getTeacher(): string
//    {
//        if (isset($this->teacherId)) {
//            $pdo = Connection::openConnection();
//            $handle = $pdo->prepare('SELECT  t.name as name FROM teacher t LEFT JOIN class c ON t.id= c.teacherId WHERE c.teacherId = :id');
//            $handle->bindValue(':id', $this->teacherId);
//            $handle->execute();
//            return $handle->fetch()['name'];
//        } else {
//            return  'no teacher';
//        }
//
//    }

}