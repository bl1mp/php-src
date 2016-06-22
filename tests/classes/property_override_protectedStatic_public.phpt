--TEST--
Redeclare inherited protected static property as public.
--FILE--
<?php

class A
{
    protected static $p = "A::p (static)";
    static function showA()
    {
        echo self::$p . "\n";
    }
}
class B extends A
{
    public $p = "B::p";
    function showB()
    {
        echo $this->p . "\n";
    }
}
function fn1105165843()
{
    A::showA();
    $b = new B();
    $b->showA();
    $b->showB();
}
fn1105165843();
--EXPECTF--

Fatal error: Cannot redeclare static A::$p as non static B::$p in %s on line %d

