<?php
$m = '0918-123-456';

$result = preg_match('/^09\d{2}-?\d{3}-?\d{3}$/', $m, $matches);
// preg_match過濾字串
var_dump($matches);
var_dump($result);