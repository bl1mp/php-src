--TEST--
Bug #42211 (property_exists() fails to find protected properties from a parent class)
--FILE--
<?php

class A
{
    function foo()
    {
        var_dump(property_exists('B', 'publicBar'));
        var_dump(property_exists('B', 'protectedBar'));
        var_dump(property_exists('B', 'privateBar'));
    }
}
class B extends A
{
    public static $publicBar = "ok";
    protected static $protectedBar = "ok";
    private static $privateBar = "fail";
}
function fn1705566932()
{
    $a = new A();
    $a->foo();
    $b = new B();
    $b->foo();
}
fn1705566932();
--EXPECT--
bool(true)
bool(true)
bool(true)
bool(true)
bool(true)
bool(true)
