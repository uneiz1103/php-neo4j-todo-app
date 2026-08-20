<?php

require __DIR__ . '/../config/bootstrap.php';

use Uneiz\TodoApp\Neo4j;
use Uneiz\TodoApp\TodoRepository;

$neo4j = new Neo4j();

$todoRepository = new TodoRepository($neo4j);

// CREATE

// $todo = $todoRepository->createTodo(3, "Cypher");

// echo $todo->getProperty('title');

// GET ALL TODOS

// $result = $todoRepository->getAllTodos();

// foreach($result as $record) {
//     $todo = $record->get('t');
//     echo $todo->getproperty('title'). PHP_EOL;
// }

// GET TODOS BY ID

$result = $todoRepository->getTodosById(3);

$todo = $result->first()->get('t');

echo $todo->getProperty('title');

