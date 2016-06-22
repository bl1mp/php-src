--TEST--
Redeclare inherited public static property as public static.
--FILE--
<?php

class A
{
    public static $p = "A::p (static)";
    static function showA()
    {
        echo self::$p . "\n";
    }
}
class B extends A
{
    public static $p = "B::p (static)";
    static function showB()
    {
        echo self::$p . "\n";
    }
}
function fn255530030()
{
    A::showA();
    B::showA();
    B::showB();
}
fn255530030();
--EXPECTF--
A::p (static)
A::p (static)
B::p (static)
