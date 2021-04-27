<?php

class Student
{
    private $mysql;

    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }

    public function exibirTodos(): array
    {
        $resultado = $this->mysql->query('SELECT * FROM students');
        $students = $resultado->fetch_all(MYSQLI_ASSOC);

        return $students;
    }
}
