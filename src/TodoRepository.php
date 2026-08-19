<?php

namespace Uneiz\TodoApp;

class TodoRepository
{
    public function __construct(private $neo4j)
    {
    }

    public function createTodo($title)
    {
        $cypher = "
            CREATE (t:Todo {
                title: \$title
            })
            RETURN t
        ";

        $parameters = [
            'title' => $title
        ];

        $result = $this->neo4j->runQuery($cypher, $parameters);

        return $result->first()->get('t');
    }
}