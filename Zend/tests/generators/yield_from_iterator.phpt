--TEST--
yield from with an (Array)Iterator
--FILE--
<?php

function g()
{
    (yield 1);
    yield from new ArrayIterator([2, 3, 4]);
    (yield 5);
}
function fn41589568()
{
    $g = g();
    foreach ($g as $yielded) {
        var_dump($yielded);
    }
}
fn41589568();
--EXPECT--
int(1)
int(2)
int(3)
int(4)
int(5)
