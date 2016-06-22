--TEST--
Variadic arguments with by-reference passing
--FILE--
<?php

function test(&...$args)
{
    $i = 0;
    foreach ($args as &$arg) {
        $arg = $i++;
    }
}
function fn79521771()
{
    test();
    test($a);
    var_dump($a);
    test($b, $c, $d);
    var_dump($b, $c, $d);
}
fn79521771();
--EXPECT--
int(0)
int(0)
int(1)
int(2)
