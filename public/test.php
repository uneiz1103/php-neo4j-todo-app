<?php

require __DIR__ . '/../config/bootstrap.php';

use Uneiz\TodoApp\Neo4j;
use Uneiz\TodoApp\TodoRepository;

$neo4j = new Neo4j();

$todoRepository = new TodoRepository($neo4j);

$todo = $todoRepository->createTodo("MYPHP");

echo $todo->getProperty('title');