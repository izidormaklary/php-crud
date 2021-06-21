<?php


class Classroom
{
    private string $name;
    private string $location;
    private int $teacherId;

    public function __construct(string $name, string $location, int $teacherId)
    {
        $this->name = $name;
        $this->location = $location;
        $this->teacherId = $teacherId;
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

    public function getTeacherId(): int
    {
        return $this->teacherId;
    }


    public function setTeacherId(int $teacherId): void
    {
        $this->teacherId = $teacherId;
    }


}