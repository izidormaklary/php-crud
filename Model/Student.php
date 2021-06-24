<?php

class Student extends Teacher
{
    private int $teacherId;
    private string $teacher;


    public function __construct(string $name, int $id, string $email, $classId, $className, int $teacherId, $teacher)
    {
       parent::__construct($name, $id, $email, $classId,$className);
        $this->teacherId = $teacherId;
        $this->teacher = $teacher;
    }

    public function getTeacherId(): int
    {
        return $this->teacherId;
    }

    public function getTeacher(): string
    {
        return $this->teacher;
    }



}