--TEST--
Dynamic calls to scope introspection functions are forbidden
--FILE--
<?php

function test_calls($func)
{
    $i = 1;
    array_map($func, [['i' => new stdClass()]]);
    var_dump($i);
    $func(['i' => new stdClass()]);
    var_dump($i);
    call_user_func($func, ['i' => new stdClass()]);
    var_dump($i);
}
function fn299826851()
{
    test_calls('extract');
}
fn299826851();
--EXPECTF--
Warning: Cannot call extract() dynamically in %s on line %d
int(1)

Warning: Cannot call extract() dynamically in %s on line %d
int(1)

Warning: Cannot call extract() dynamically in %s on line %d
int(1)
