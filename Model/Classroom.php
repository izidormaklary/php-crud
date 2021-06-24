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

    public function getLocation(): string
    {
        return $this->location;
    }

    public function getTeacher()
    {
        return $this->teacher;
    }

    public function getTeacherId()
    {
        return $this->teacherId;
    }

    public function getStudents(): array
    {
        return $this->students;
    }
}