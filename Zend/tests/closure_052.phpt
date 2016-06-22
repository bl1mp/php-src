--TEST--
Closure 052: static::class in non-static closure in static method.

--FILE--
<?php

class A
{
    static function foo()
    {
        $f = function () {
            return static::class;
        };
        return $f();
    }
}
class B extends A
{
}
function fn996149527()
{
    var_dump(B::foo());
}
fn996149527();
--EXPECT--
string(1) "B"
