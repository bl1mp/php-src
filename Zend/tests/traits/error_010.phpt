--TEST--
Trying to exclude trait method multiple times
--FILE--
<?php

trait foo
{
    public function test()
    {
        return 3;
    }
}
trait c
{
    public function test()
    {
        return 2;
    }
}
class bar
{
    use foo, c {
        c::test insteadof foo;
    }
    use foo, c {
        c::test insteadof foo;
    }
}
function fn2093876822()
{
    $x = new bar();
    var_dump($x->test());
}
fn2093876822();
--EXPECTF--
Fatal error: Failed to evaluate a trait precedence (test). Method of trait foo was defined to be excluded multiple times in %s on line %d
