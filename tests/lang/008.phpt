--TEST--
Testing recursive function
--FILE--
<?php

function Test()
{
    static $a = 1;
    echo "{$a} ";
    $a++;
    if ($a < 10) {
        Test();
    }
}
function fn112285669()
{
    Test();
}
fn112285669();
--EXPECT--
1 2 3 4 5 6 7 8 9 
