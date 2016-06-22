--TEST--
Bug #38942 (Double old-style-ctor inheritance)
--FILE--
<?php

class foo
{
    public function foo()
    {
    }
}
class bar extends foo
{
}
function fn846710483()
{
    print_r(get_class_methods("bar"));
}
fn846710483();
--EXPECTF--
Deprecated: Methods with the same name as their class will not be constructors in a future version of PHP; foo has a deprecated constructor in %s on line %d
Array
(
    [0] => foo
)
