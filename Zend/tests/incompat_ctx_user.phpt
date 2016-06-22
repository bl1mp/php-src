--TEST--
Incompatible context call (non-internal function)
--FILE--
<?php

class A
{
    function foo()
    {
        var_dump(get_class($this));
    }
}
class B
{
    function bar()
    {
        A::foo();
    }
}
function fn1518839774()
{
    $b = new B();
    try {
        $b->bar();
    } catch (Throwable $e) {
        echo "Exception: " . $e->getMessage() . "\n";
    }
}
fn1518839774();
--EXPECTF--
Deprecated: Non-static method A::foo() should not be called statically in %s on line %d
Exception: Using $this when not in object context
