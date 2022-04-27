<?php

namespace miyasinarafat\DesignPatterns\Tests;

use miyasinarafat\DesignPatterns\Builder\MysqlQueryBuilder;
use miyasinarafat\DesignPatterns\Builder\PostgresQueryBuilder;
use miyasinarafat\DesignPatterns\Builder\SQLQueryBuilder;
use PHPUnit\Framework\TestCase;

/**
 * @group builder
 */
class SQLQueryBuilderTest extends TestCase
{
    /** @test */
    public function mysqlQueryBuilder(): void
    {
        $query = $this->buildQuery(new MysqlQueryBuilder());

        $this->assertTrue(str_contains($query, 'SELECT'));
    }

    /** @test */
    public function postgresQueryBuilder(): void
    {
        $query = $this->buildQuery(new PostgresQueryBuilder());

        $this->assertTrue(str_contains($query, 'OFFSET'));
    }

    /**
     * @param SQLQueryBuilder $builder
     * @return string
     */
    private function buildQuery(SQLQueryBuilder $builder): string
    {
        return $builder
            ->select("users", ["name", "email", "password"])
            ->where("age", 18, ">")
            ->where("age", 30, "<")
            ->limit(10, 20)
            ->getSQL();
    }
}