--TEST--
Basic class support - attempting to pass a class constant by reference.
--FILE--
<?php

class aclass
{
    const myConst = "hello";
}
function f(&$a)
{
    $a = "changed";
}
function fn1999687007()
{
    f(aclass::myConst);
    var_dump(aclass::myConst);
}
fn1999687007();
--EXPECTF--

Fatal error: Only variables can be passed by reference in %s on line %d
