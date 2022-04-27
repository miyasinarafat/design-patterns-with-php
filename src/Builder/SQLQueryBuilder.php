<?php

namespace miyasinarafat\DesignPatterns\Builder;

/**
 * The Builder interface declares a set of methods to assemble an SQL query.
 *
 * All the construction steps are returning the current builder object to
 * allow chaining: $builder->select(...)->where(...)
 */
interface SQLQueryBuilder
{
    public function select(string $table, array $fields): self;

    public function where(string $field, mixed $value, string $operator = '='): self;

    public function limit(int $start, int $offset): self;

    // +100 other SQL syntax methods...

    public function getSQL(): string;
}
