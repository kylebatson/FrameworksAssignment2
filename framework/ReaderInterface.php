<?php
interface ReaderInterface{
    //Searches for a table in the record that has $ids
    public function find(string $tablename, array $ids): array;

    //Retrieves all records from a table
    public function findAll(string $tablename, array $ids):array;
}

