<?php


class Teacher
{

    private string $name;
    private int $id;
    private string $email;
    private $classId;
    private $className;
    private array $students=[];



    public function __construct(string $name, int $id, string $email, $classId, $className)
    {
        $this->name = $name;
        $this->id = $id;
        $this->email = $email;
        $this->classId = $classId;
        $this->className= $className;
    }

    public function getStudents(): array
    {
        return $this->students;
    }

    public function setStudents(array $students): void
    {
        $this->students = $students;
    }

    public function getClassName()
    {
        return $this->className;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }


    public function getClassId()
    {
        return $this->classId;
    }
}

