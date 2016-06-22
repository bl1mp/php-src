--TEST--
Error message in error handler during compilation
--FILE--
<?php

function fn194319276()
{
    set_error_handler(function ($_, $msg, $file) {
        var_dump($msg, $file);
        echo $undefined;
    });
    /* This is just a particular example of a non-fatal compile-time error
     * If this breaks in future, just find another example and use it instead */
    eval('class A { function test() { } } class B extends A { function test($a) { } }');
}
fn194319276();
--EXPECTF--
string(62) "Declaration of B::test($a) should be compatible with A::test()"
string(%d) "%s(%d) : eval()'d code"

Notice: Undefined variable: undefined in %s on line %d
