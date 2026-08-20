<?php

namespace Uneiz\TodoApp;

class TodoRepository
{
    public function __construct(private $neo4j)
    {
    }

    public function createTodo($id, $title)
    {
        $cypher = "
            CREATE (t:Todo {
                id: \$id,
                title: \$title
            })
            RETURN t
        ";

        $parameters = [
            'id' => $id,
            'title' => $title
        ];

        $result = $this->neo4j->runQuery($cypher, $parameters);

        return $result->first()->get('t');
    }

    public function getAllTodos()
    {
        $cypher = "
            MATCH (t:Todo)
            RETURN t
        ";

        $parameters = [];

        $result = $this->neo4j->runQuery($cypher, $parameters);

        return $result;
    }

    public function getTodosById($id){
        $cypher = "
            MATCH (t:Todo)
            WHERE t.id = \$id
            RETURN t
        ";

        $parameters = [
            'id' => $id
        ];

        $result = $this->neo4j->runQuery($cypher, $parameters);

        return $result;
    }
}