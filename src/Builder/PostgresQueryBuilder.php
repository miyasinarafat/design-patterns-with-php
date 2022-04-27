<?php

namespace miyasinarafat\DesignPatterns\Builder;

/**
 * This Concrete Builder is compatible with PostgresSQL. While Postgres is very
 * similar to Mysql, it still has several differences. To reuse the common code,
 * we extend it from the MySQL builder, while overriding some building steps.
 */
class PostgresQueryBuilder extends MysqlQueryBuilder
{
    /**
     * Among other things, PostgresSQL has slightly different LIMIT syntax.
     */
    public function limit(int $start, int $offset): SQLQueryBuilder
    {
        parent::limit($start, $offset);

        $this->query->limit = " LIMIT " . $start . " OFFSET " . $offset;

        return $this;
    }

    // + tons of other overrides...
}
