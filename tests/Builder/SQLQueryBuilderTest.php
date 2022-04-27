<?php

namespace miyasinarafat\DesignPatterns\Tests\Builder;

use miyasinarafat\DesignPatterns\Builder\MysqlQueryBuilder;
use miyasinarafat\DesignPatterns\Builder\PostgresQueryBuilder;
use miyasinarafat\DesignPatterns\Builder\SQLQueryBuilder;
use PHPUnit\Framework\TestCase;

/**
 * @group builder
 */
final class SQLQueryBuilderTest extends TestCase
{
    /** @test */
    public function mysqlQueryBuilder(): void
    {
        $query = $this->buildQuery(new MysqlQueryBuilder())->getSQL();

        $this->assertStringContainsString('SELECT', $query);
    }

    /** @test */
    public function postgresQueryBuilder(): void
    {
        $query = $this->buildQuery(new PostgresQueryBuilder())->getSQL();

        $this->assertStringContainsString('OFFSET', $query);
    }

    /**
     * @param SQLQueryBuilder $builder
     * @return SQLQueryBuilder
     */
    private function buildQuery(SQLQueryBuilder $builder): SQLQueryBuilder
    {
        return $builder
            ->select("users", ["name", "email", "password"])
            ->where("age", 18, ">")
            ->where("age", 30, "<")
            ->limit(10, 20);
    }
}
