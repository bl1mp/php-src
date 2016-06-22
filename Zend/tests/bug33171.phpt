--TEST--
Bug #33171 (foreach enumerates private fields declared in base classes)
--FILE--
<?php

class A
{
    private $c = "A's c";
}
class B extends A
{
    private $c = "B's c";
    public function go()
    {
        foreach ($this as $key => $val) {
            echo "{$key} => {$val}\n";
        }
    }
}
function fn1999584734()
{
    $x = new B();
    $x->go();
}
fn1999584734();
--EXPECT--
c => B's c
