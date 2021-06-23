<?php

class Student extends Teacher
{
    private int $teacherId;


    public function __construct(string $name, int $id, string $email, int $teacherId)
    {
       parent::__construct($name, $id, $email);
        $this->teacherId = $teacherId;
    }

    public function getTeacherId(): int
    {
        return $this->teacherId;
    }


}