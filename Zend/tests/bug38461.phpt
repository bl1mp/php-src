--TEST--
Bug #38461 (setting private attribute with __set() produces segfault)
--FILE--
<?php

class Operation
{
    function __set($var, $value)
    {
        $this->{$var} = $value;
    }
}
class ExtOperation extends Operation
{
    private $x;
}
function fn1462527141()
{
    $op = new ExtOperation();
    $op->x = 'test';
    echo "Done\n";
}
fn1462527141();
--EXPECT--	
Done
