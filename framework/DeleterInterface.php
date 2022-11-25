<?php
interface DeleterInterface{
    public function del(string $tablenames, array $ids);
}

