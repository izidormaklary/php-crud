<?php

class Student
{
    private string $name;
    private int $id;
    private string $email;
    private int $classId;

    public function __construct(string $name, int $id, string $email, int $classId)
    {
        $this->name = $name;
        $this->id = $id;
        $this->email = $email;
        $this->classId = $classId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getClassId(): int
    {
        return $this->classId;
    }

    public function setClassId(int $classId): void
    {
        $this->classId = $classId;
    }

}