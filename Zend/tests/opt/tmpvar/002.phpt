--TEST--
Tmpvar 002
--FILE--
<?php

function test()
{
    $l = 5;
    for ($i = 0; $i < $l; $i += 1) {
        echo "{$i}\n";
    }
}
function fn85666999()
{
    test();
}
fn85666999();
--EXPECT--
0
1
2
3
4
