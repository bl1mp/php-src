--TEST--
Bug #34879 (str_replace, array_map corrupt negative array indexes on 64-bit platforms)
--FILE--
<?php

function fn1445318625()
{
    print_r(str_replace('a', 'b', array(-1 => -1)));
}
fn1445318625();
--EXPECT--
Array
(
    [-1] => -1
)