--TEST--
027: Name ambiguity (class name & part of extertnal namespace name)
--FILE--
<?php

class Foo
{
    function __construct()
    {
        echo __CLASS__, "\n";
    }
    static function Bar()
    {
        echo __CLASS__, "\n";
    }
}
function fn1087905936()
{
    require "ns_027.inc";
    $x = new Foo();
    Foo::Bar();
    $x = new Foo\Bar\Foo();
    Foo\Bar\Foo::Bar();
}
fn1087905936();
--EXPECT--
Foo
Foo
Foo\Bar\Foo
Foo\Bar\Foo
