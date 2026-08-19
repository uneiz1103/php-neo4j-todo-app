<?php

namespace Uneiz\TodoApp;

use Laudis\Neo4j\ClientBuilder;
use Laudis\Neo4j\Authentication\Authenticate;


class Neo4j
{
    private $client;

    public function __construct()
{
    $authentication = Authenticate::basic(
        $_ENV['NEO4J_USERNAME'],
        $_ENV['NEO4J_PASSWORD']
    );

    $this->client = ClientBuilder::create()
        ->withDriver(
            'bolt',
            $_ENV['NEO4J_URI'],
            $authentication
        )
        ->build();
    }

    public function runQuery($cypher, $parameters)
    {
        return $this->client->run($cypher, $parameters);
    }

}