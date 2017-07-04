--TEST--
Testing user-defined function falling out of an If into another
--FILE--
<?php

function Test($a)
{
    if ($a < 3) {
        return 3;
    }
}
function fn1660979376()
{
    $a = 1;
    if ($a < Test($a)) {
        echo "{$a}\n";
        $a++;
    }
}
fn1660979376();
--EXPECT--
1
