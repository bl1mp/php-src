--TEST--
Bug #33996 (No information given for fatal error on passing invalid value to typed argument)
--INI--
error_reporting=8191
--FILE--
<?php

class Foo
{
}
function FooTest(Foo $foo)
{
    echo "Hello!";
}
function NormalTest($a)
{
    echo "Hi!";
}
function fn1421470883()
{
    try {
        NormalTest();
    } catch (Throwable $e) {
        echo "Exception: " . $e->getMessage() . "\n";
    }
    try {
        FooTest();
    } catch (Throwable $e) {
        echo "Exception: " . $e->getMessage() . "\n";
    }
    FooTest(new Foo());
}
fn1421470883();
--EXPECTF--
Exception: Too few arguments to function NormalTest(), 0 passed in %sbug33996.php on line %d and exactly 1 expected
Exception: Too few arguments to function FooTest(), 0 passed in %sbug33996.php on line %d and exactly 1 expected
Hello!
